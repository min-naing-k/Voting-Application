<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;

class IdeaController extends Controller
{
  public function index()
  {
    // $user = User::findOrFail(1);
    // $user->assignRole('admin');

    # You can replace withCount(['..', 'votes as voted_by_user'])
    // ->addSelect(['voted_by_user' => Vote::select('id')
    //         ->where('user_id', auth()->id())
    //         ->whereColumn('idea_id', 'ideas.id'),
    //     ])
    // ->withCount([
    //   'votes as voted_by_user' => function ($query) {
    //     $query->where('user_id', auth()->id());
    //   },
    // ])
    
    return view('idea.index');
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
      'backUrl' => url()->previous() !== url()->full() && !request()->getQueryString() ? url()->previous() : route('idea.index'),
      'backText' => url()->previous() !== url()->full() && !request()->getQueryString() ? '(back to chosen category with filters)' : '',
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
