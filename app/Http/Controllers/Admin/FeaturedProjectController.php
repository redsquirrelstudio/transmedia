<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeaturedProject\BulkDestroyFeaturedProject;
use App\Http\Requests\Admin\FeaturedProject\DestroyFeaturedProject;
use App\Http\Requests\Admin\FeaturedProject\IndexFeaturedProject;
use App\Http\Requests\Admin\FeaturedProject\StoreFeaturedProject;
use App\Http\Requests\Admin\FeaturedProject\UpdateFeaturedProject;
use App\Models\FeaturedProject;
use App\Models\FeaturedProjectUser;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FeaturedProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFeaturedProject $request
     * @return array|Factory|View
     */
    public function index(IndexFeaturedProject $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(FeaturedProject::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'youtube_url'],

            // set columns to searchIn
            ['id', 'title', 'description', 'youtube_url']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.featured-project.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.featured-project.create');

        return view('admin.featured-project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFeaturedProject $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFeaturedProject $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $users = $sanitized['user_id'];
        unset($sanitized['user_id']);

        // Store the FeaturedProject
        $featuredProject = FeaturedProject::create($sanitized);

        foreach($users as $user){
            $link = new FeaturedProjectUser([
                'user_id' => $user,
                'featured_project_id' => $featuredProject->id
            ]);
            $link->save();
        }

        if ($request->ajax()) {
            return ['redirect' => url('admin/featured-projects'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/featured-projects');
    }

    /**
     * Display the specified resource.
     *
     * @param FeaturedProject $featuredProject
     * @throws AuthorizationException
     * @return void
     */
    public function show(FeaturedProject $featuredProject)
    {
        $this->authorize('admin.featured-project.show', $featuredProject);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FeaturedProject $featuredProject
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(FeaturedProject $featuredProject)
    {
        $this->authorize('admin.featured-project.edit', $featuredProject);


        return view('admin.featured-project.edit', [
            'featuredProject' => $featuredProject,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFeaturedProject $request
     * @param FeaturedProject $featuredProject
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFeaturedProject $request, FeaturedProject $featuredProject)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values FeaturedProject
        $featuredProject->update($sanitized);

        $users = $sanitized['user_id'];
        unset($sanitized['user_id']);

        FeaturedProjectUser::where('featured_project_id', $featuredProject->id)->delete();

        foreach($users as $user){
            $link = new FeaturedProjectUser([
                'user_id' => $user,
                'featured_project_id' => $featuredProject->id
            ]);
            $link->save();
        }

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/featured-projects'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/featured-projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFeaturedProject $request
     * @param FeaturedProject $featuredProject
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFeaturedProject $request, FeaturedProject $featuredProject)
    {
        $featuredProject->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFeaturedProject $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFeaturedProject $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    FeaturedProject::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
