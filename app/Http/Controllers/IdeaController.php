<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;

class IdeaController extends Controller
{
  public function index()
  {
    return view('idea.index', [
      'ideas' => Idea::with('user', 'category', 'status')
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
