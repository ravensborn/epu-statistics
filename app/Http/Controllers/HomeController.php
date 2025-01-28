<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function statistics($college)
    {
        session()->forget('error');
        $url = "https://admissions.epu.edu.iq/{$college}/api/v1/statistics";
        $data = [];

        try {
            $response = Http::withHeaders([
                'x-api-key' => config('keys.ACCESS_API_KEY'),
            ])->get($url);

            if ($response->successful()) {

                $data = $response->json();

            } else {

                session()->put('error', true);
            }
        } catch (\Exception $e) {

            session()->put('error', true);
        }

        return view('statistics', [
            'departments' => $data,
        ]);

    }

    public function index()
    {

        $colleges = [
            'ectc' => [
                'kurdish' => 'کۆلیژی ئەندازیاری کۆمپیوتەر و ئینفۆرماتیک',
                'english' => 'Erbil Computer and Informatics Engineering College',
            ],
            'etec' => [
                'kurdish' => 'کۆلێژى تەکنیکى ئەندازیارى هەولێر',
                'english' => 'Erbil Technical Engineering College',
            ],
            'ethc' => [
                'kurdish' => 'کۆلێژی تەکنیکی تەندروستی و پزیشکی هەولێر',
                'english' => 'Erbil Technical Health and Medical College',
            ],
            'etac' => [
                'kurdish' => 'کۆلێژی تەکنیکی کارگێری هەولێر',
                'english' => 'Erbil Technical Administrative College',
            ],
            'ertc' => [
                'kurdish' => 'كۆلێژی تەکنەلۆجی هەولێر',
                'english' => 'Erbil Technology Collage',
            ],
            'etai' => [
                'kurdish' => 'پەیمانگەی تەکنیکی کارگێری هەولێر',
                'english' => 'Erbil Technical Administrative Institute',
            ],
            'etmi' => [
                'kurdish' => 'پەیمانگەی تەکنیکی پزیشکی هەولێر',
                'english' => 'Erbil Technical Medical Institute',
            ],
            'koti' => [
                'kurdish' => 'پەیمانگەى تەکنیکى کۆیە',
                'english' => 'Koya Technical Institute',
            ],
            'sotc' => [
                'kurdish' => 'كۆلێژی تەکنیکی سۆران',
                'english' => 'Soran Technical College',
            ],
            'shtc' => [
                'kurdish' => 'کۆلێژى تەکنیکى شەقڵاوە',
                'english' => 'Shaqlawa Technical Collage',
            ],
            'khti' => [
                'kurdish' => 'پەیمانگەی تەکنیکی خەبات',
                'english' => 'Khabat Technical Institute',
            ],
            'chti' => [
                'kurdish' => 'پەیمانگەی تەکنیکی چۆمان',
                'english' => 'Choman Technical Institute',
            ],
            'meti' => [
                'kurdish' => 'پەیمانگەی تەکنیکی مێرگەسۆر',
                'english' => ' Mergasor Technical Institute',
            ],
        ];


        return view('home', [
            'colleges' => $colleges,
        ]);

    }
}
