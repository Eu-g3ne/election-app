<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Candidate
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $birthday
 * @property string $education
 * @property string $passport
 * @property string $activity
 * @property int $total_votes
 * @property-read \App\Models\Contract|null $contract
 * @method static \Database\Factories\CandidateFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate wherePassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereTotalVotes($value)
 */
	class Candidate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Constituency
 *
 * @property int $id
 * @property string $region
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property int $total_voters
 * @method static \Database\Factories\ConstituencyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Constituency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Constituency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Constituency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Constituency whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Constituency whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Constituency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Constituency wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Constituency whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Constituency whereTotalVoters($value)
 */
	class Constituency extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contract
 *
 * @property int $id
 * @property string $entry_date
 * @property int $mandate_number
 * @property int $candidate_id
 * @property int $party_id
 * @property-read \App\Models\Candidate|null $candidate
 * @property-read \App\Models\Party|null $party
 * @method static \Database\Factories\ContractFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereCandidateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereEntryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereMandateNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract wherePartyId($value)
 */
	class Contract extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Election
 *
 * @property int $id
 * @property string $post
 * @property string $status
 * @property string $vote
 * @property string $started_at
 * @property string $finished_at
 * @method static \Database\Factories\ElectionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Election newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Election newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Election query()
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election wherePost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Election whereVote($value)
 */
	class Election extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Party
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $leader
 * @property int $total_members
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contract[] $contracts
 * @property-read int|null $contracts_count
 * @method static \Database\Factories\PartyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Party newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Party newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Party query()
 * @method static \Illuminate\Database\Eloquent\Builder|Party whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Party whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Party whereLeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Party whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Party whereTotalMembers($value)
 */
	class Party extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PollingStation
 *
 * @property int $id
 * @property string $address
 * @property string $city
 * @property string $phone
 * @property int $total_voters
 * @method static \Database\Factories\PollingStationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PollingStation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollingStation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollingStation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PollingStation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollingStation whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollingStation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollingStation wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollingStation whereTotalVoters($value)
 */
	class PollingStation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Registration
 *
 * @property int $id
 * @property string $country
 * @property string $city
 * @property string $address
 * @property int $voter_id
 * @property int $constituency_id
 * @property int $polling_station_id
 * @method static \Database\Factories\RegistrationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration query()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereConstituencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration wherePollingStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereVoterId($value)
 */
	class Registration extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Voter
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $birthday
 * @property string $birthplace
 * @property string $inn
 * @property string $passport
 * @method static \Database\Factories\VoterFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Voter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Voter whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voter whereBirthplace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voter whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voter wherePassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voter wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voter whereSurname($value)
 */
	class Voter extends \Eloquent {}
}

