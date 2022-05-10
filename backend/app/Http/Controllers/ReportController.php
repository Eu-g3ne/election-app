<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Constituency;
use App\Models\Election;
use App\Models\Party;
use App\Models\PollingStation;
use App\Models\Voter;
use Illuminate\Http\Request;
use ExcelReport;
use Throwable;

class ReportController extends Controller
{
  public function elections()
  {
    try {
      $data = Election::select();
      $title = 'Registered User Report';
      $meta = [];
      $columns = [
        'Пост' => 'post',
        'Статус' => 'status',
        'Дата початку' => 'started_at',
        'Дата закінчення' => 'finished_at',
      ];
      return ExcelReport::of($title, $meta, $data, $columns)->simple()->download('myreport');
    } catch (Throwable $e) {
      report($e);
      return response()->json(['success' => false], 502);
    }
  }

  public function voters()
  {
    try {
      $data = Voter::select();
      $title = 'Registered User Report';
      $meta = [];
      $columns = [
        'Прізвище' => 'surname',
        "Ім'я" => 'name',
        'По-батькові' => 'patronymic',
        'Дата народження' => 'birthday',
        'Місце народження' => 'birthplace',
        'ІНН' => 'inn',
        'Паспорт' => 'passport',
      ];
      return ExcelReport::of($title, $meta, $data, $columns)->simple()->download('myreport');
    } catch (Throwable $e) {
      report($e);
      return response()->json(['success' => false], 502);
    }
  }

  public function candidates()
  {
    try {
      $data = Candidate::select();
      $title = 'Звіт по кандидатам';
      $meta = [];
      $columns = [
        'Прізвище' => 'surname',
        "Ім'я" => 'name',
        'По-батькові' => 'patronymic',
        'Дата народження' => 'birthday',
        'Освіта' => 'education',
        'Паспорт' => 'passport',
        'Діяльність' => 'activity',
      ];
      return ExcelReport::of($title, $meta, $data, $columns)->simple()->download('myreport');
    } catch (Throwable $e) {
      report($e);
      return response()->json(['success' => false], 502);
    }
  }

  public function parties()
  {
    try {
      $data = Party::select();
      $title = 'Звіт по партіям';
      $meta = [];
      $columns = [
        'Назва' => 'name',
        "Дата створення" => 'created_at',
        'Лідер' => 'leader',
        'Кількість членів' => 'total_members',
      ];
      return ExcelReport::of($title, $meta, $data, $columns)->simple()->download('myreport');
    } catch (Throwable $e) {
      report($e);
      return response()->json(['success' => false], 502);
    }
  }

  public function constituencies()
  {
    try {
      $data = Constituency::select();
      $title = 'Звіт по виборчим округам';
      $meta = [];
      $columns = [
        'Регіон' => 'name',
        "Електронна пошта" => 'email',
        'Телефон' => 'phone',
        'Адреса' => 'address',
        'Кількість виборців' => 'total_voters',
      ];
      return ExcelReport::of($title, $meta, $data, $columns)->simple()->download('myreport');
    } catch (Throwable $e) {
      report($e);
      return response()->json(['success' => false], 502);
    }
  }

  public function pollingStations()
  {
    try {
      $data = PollingStation::select();
      $title = 'Звіт по виборчим дільницям';
      $meta = [];
      $columns = [
        'Адреса' => 'address',
        'Місто' => 'city',
        'Телефон' => 'phone',
        'Кількість виборців' => 'total_voters',
      ];
      return ExcelReport::of($title, $meta, $data, $columns)->simple()->download('myreport');
    } catch (Throwable $e) {
      report($e);
      return response()->json(['success' => false], 502);
    }
  }
}
