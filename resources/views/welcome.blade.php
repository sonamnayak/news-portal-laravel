<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> 

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            
            <?php use Illuminate\Support\Facades\DB; ?>
            <x-guest-layout>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <h1 class="font-bold text-4xl text-gray-800 leading-tight text-center mb-5">
                            NEWS
                        </h1>
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    

                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                                <div class="grid grid-flow-row grid-cols-3  gap-4">
                                <?php $posts = DB::select('select * from posts'); 
                                $images = DB::select('select * from images');?>
                                @foreach ($posts as $post)
                                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                        <div class="px-6 py-4">
                                            <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                                            <p class="text-gray-700 text-base">
                                                {{ Str::words($post->content, 20, '...') }}
                                            </p>  
                                        </div>
                                        <div class="px-6 pt-4 pb-2">
                                            <a href="{{ url('dashboard/posts', $post->id) }}"
                                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-900 focus:outline-none focus:border-red-700 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                                Read post
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </x-guest-layout>

        </div>
    </body>
</html>
