<template>
    <div>
        <transition-group name="fade-slow" mode="out-in">
            <div v-show="loaded" key="viewer" class="viewer">
                <div ref="three">
                </div>
                <div class="instructions" v-if="showInstructions" @click="showInstructions = false">
                    The Transmedia exhibition has loaded and will show shortly.
                    You can move using WASD or the arrow keys. The mouse lets you look around.
                    Browse through our student's work and enjoy. <br>
                    Click this message to continue.
                </div>
            </div>

            <div class="loader" v-show="!loaded" key="loader">
                <load-fill :loaded="progress"></load-fill>
                <slot name="logo"></slot>
                <div class="load-text">
                    Please wait... The Exhibition is loading <i class="las la-spinner spinner"></i>
                </div>
            </div>
        </transition-group>
    </div>
</template>
<script>
import * as THREE from 'three';
import LoadFill from "./LoadFill";
import {GLTFLoader} from 'three/examples/jsm/loaders/GLTFLoader.js';
import { DRACOLoader} from 'three/examples/jsm/loaders/DRACOLoader';
import {PointerLockControls} from 'three/examples/jsm/controls/PointerLockControls.js';

export default {
    name: 'three-test',
    components: {
        LoadFill,
    },
    props: {
        modelPath: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            camera: null,
            renderer: null,
            scene: null,
            controls: null,
            raycaster: null,
            progress: 0,
            loader: null,
            moveForward: false,
            moveBackward: false,
            moveLeft: false,
            moveRight: false,
            prevTime: performance.now(),
            velocity: new THREE.Vector3(),
            direction: new THREE.Vector3(),
            objects: [],
            loaded: false,
            showInstructions: false,
        }
    },
    mounted() {
        this.initCamera();
        this.initScene();
        this.initControls();
        this.loadEnvironment();
        this.initRenderer();
    },
    methods: {
        initCamera() {
            this.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 1, 1000);
            this.camera.position.y = 0;
        },
        initScene() {
            this.scene = new THREE.Scene();
            this.scene.background = new THREE.Color(0x404040);
            const light = new THREE.AmbientLight( 0x404040 ); // soft white light
            this.scene.add( light );
            this.scene.fog = new THREE.Fog(0xEEEEEE, 0, 750);
        },
        initControls() {
            this.controls = new PointerLockControls(this.camera, document.body);
            document.addEventListener('keydown', this._handleKeyDown);
            document.addEventListener('keyup', this._handleKeyUp);
            this.raycaster = new THREE.Raycaster(new THREE.Vector3(), new THREE.Vector3(0, -1, 0), 0, 10);
            this.$refs.three.addEventListener('click', () => {
                this.controls.lock();
            });
            this.scene.add(this.controls.getObject());
        },
        loadEnvironment() {
            this.loader = new GLTFLoader().setPath('models/');
            const draco = new DRACOLoader();
            draco.setDecoderConfig({ type: 'js' });
            draco.setDecoderPath('https://www.gstatic.com/draco/v1/decoders/');
            this.loader.setDRACOLoader( draco );
            this.loader.load('exhibition.glb', (gltf) => {
                    gltf.scene.traverse(child => {
                        if (child.isMesh) {
                            this.objects.push(child);
                        }
                    });
                    gltf.scene.position.y = 8;
                    gltf.scene.scale.x = 2;
                    gltf.scene.scale.y = 2;
                    gltf.scene.scale.z = 2;
                    this.scene.add(gltf.scene);
                    this.animate();
                },
                (xhr) => {
                    this.progress = (xhr.loaded / xhr.total) * 100;
                    if(xhr.loaded === xhr.total){
                        this.loaded = true;
                        this.showInstructions = true;
                    }
                });
        },
        initRenderer() {
            this.renderer = new THREE.WebGLRenderer({antialias: true});
            this.renderer.setPixelRatio(window.devicePixelRatio);
            this.renderer.setSize(window.innerWidth, window.innerHeight);
            this.$refs.three.appendChild(this.renderer.domElement);
            this.renderer.setClearColor(0x808080);
            window.addEventListener('resize', this._handleWindowResize);
        },
        _handleKeyDown(e) {
            switch (e.code) {
                case 'ArrowUp':
                case 'KeyW':
                    this.moveForward = true;
                    break;
                case 'ArrowLeft':
                case 'KeyA':
                    this.moveLeft = true;
                    break;
                case 'ArrowDown':
                case 'KeyS':
                    this.moveBackward = true;
                    break;
                case 'ArrowRight':
                case 'KeyD':
                    this.moveRight = true;
                    break;
            }
        },
        _handleKeyUp(e) {
            switch (e.code) {
                case 'ArrowUp':
                case 'KeyW':
                    this.moveForward = false;
                    break;
                case 'ArrowLeft':
                case 'KeyA':
                    this.moveLeft = false;
                    break;
                case 'ArrowDown':
                case 'KeyS':
                    this.moveBackward = false;
                    break;
                case 'ArrowRight':
                case 'KeyD':
                    this.moveRight = false;
                    break;
            }
        },
        _handleWindowResize() {
            this.camera.aspect = window.innerWidth / window.innerHeight;
            this.camera.updateProjectionMatrix();
            this.renderer.setSize(window.innerWidth, window.innerHeight);
        },
        animate() {
            requestAnimationFrame(this.animate);
            const time = performance.now();
            this.raycaster.ray.origin.copy(this.controls.getObject().position);
            this.raycaster.ray.origin.y -= 10;
            const intersections = this.raycaster.intersectObjects(this.objects, true);
            const onObject = intersections.length > 0;
            const delta = (time - this.prevTime) / 4000;
            this.velocity.x -= this.velocity.x * 10.0 * delta;
            this.velocity.z -= this.velocity.z * 10.0 * delta;
            this.velocity.y -= 9.8 * 100.0 * delta; // 100.0 = mass
            this.direction.z = Number(this.moveForward) - Number(this.moveBackward);
            this.direction.x = Number(this.moveRight) - Number(this.moveLeft);
            this.direction.normalize(); // this ensures consistent movements in all directions
            if (this.moveForward || this.moveBackward) this.velocity.z -= this.direction.z * 400.0 * delta;
            if (this.moveLeft || this.moveRight) this.velocity.x -= this.direction.x * 400.0 * delta;
            if (onObject === true) {
                this.velocity.y = Math.max(0, this.velocity.y);
            }
            this.controls.moveRight(-this.velocity.x * delta);
            this.controls.moveForward(-this.velocity.z * delta);
            this.controls.getObject().position.y += (this.velocity.y * delta); // new behavior
            if (this.controls.getObject().position.y < 10) {
                this.velocity.y = 0;
                this.controls.getObject().position.y = 10;
            }
            this.prevTime = time;
            this.renderer.render(this.scene, this.camera);
        }
    }
}
</script>

