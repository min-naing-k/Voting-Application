<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;

class IdeaController extends Controller
{
  public function index()
  {
    # You can replace withCount(['..', 'votes as voted_by_user'])
    // ->addSelect(['voted_by_user' => Vote::select('id')
    //         ->where('user_id', auth()->id())
    //         ->whereColumn('idea_id', 'ideas.id'),
    //     ])
    return view('idea.index', [
      'ideas' => Idea::with('user', 'category', 'status')
        ->withCount([
          'votes',
          'votes as voted_by_user' => function($query) {
            $query->where('user_id', auth()->id());
          }
        ])
        ->orderBy('id', 'desc')
        ->simplePaginate(Idea::PAGINATION_COUNT),
    ]);
  }

  public function create()
  {
    //
  }

  public function store(StoreIdeaRequest $request)
  {
    //
  }

  public function show(Idea $idea)
  {
    return view('idea.show', [
      'idea' => $idea,
      'votesCount' => $idea->votes()->count(),
    ]);
  }

  public function edit(Idea $idea)
  {
    //
  }

  public function update(UpdateIdeaRequest $request, Idea $idea)
  {
    //
  }

  public function destroy(Idea $idea)
  {
    //
  }
}
