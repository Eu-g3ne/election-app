<?php

namespace App\Http\Controllers;

use App\Http\Requests\Party\StoreRequest;
use App\Http\Requests\Party\UpdateRequest;
use App\Http\Resources\PartyCollection;
use App\Http\Resources\PartyResource;
use App\Models\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{

  //
  protected Party $party;

  public function __construct(Party $party)
  {
    $this->party = $party;
  }

  public function index()
  {
    $parties = Party::all()->paginate(5);
    return new PartyCollection($parties);
  }

  public function store(StoreRequest $request)
  {
    $party = Party::create($request->validated());
    return new PartyResource($party);
  }

  public function update(UpdateRequest $request, Party $party)
  {
    $party->update($request->validated());
    return new PartyResource($party);
  }

  public function show(Party $party)
  {
    return new PartyResource($party);
  }

  public function destroy(Party $party)
  {
    $party->delete();
  }
}
