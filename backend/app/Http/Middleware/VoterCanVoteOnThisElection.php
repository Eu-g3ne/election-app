<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VoterCanVoteOnThisElection
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    $data = $request->route()->parameters();
    $election = $data['election'];
    $voter = $data['voter'];

    if ($voter->elections()->find($election->id) !== null) {
      return response()->json([
        'message' => 'This voter has already voted in this election',
        'success' => false
      ]);
    }
    return $next($request);
  }
}
