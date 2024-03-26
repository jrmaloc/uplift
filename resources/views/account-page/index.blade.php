@extends('layouts.account')

@section('head')
    <title>Home | Uplift</title>
    <style>
        .field-reactions:checked:focus~.text-desc,
        .field-reactions,
        [class*=reaction-],
        .text-desc {
            clip: rect(1px, 1px, 1px, 1px);
            overflow: hidden;
            position: absolute;
            top: 0;
            left: 0;
        }

        .field-reactions:checked~[class*=reaction-],
        .box:hover [class*=reaction-],
        .field-reactions:focus~.text-desc {
            clip: auto;
            overflow: visible;
            opacity: 1;
        }

        .main-title {
            background: #3a5795;
            padding: 10px;
            color: #fff;
            text-align: center;
            font-size: 16px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .text-desc {
            font-weight: normal;
            text-align: center;
            transform: translateY(-50px);
            white-space: nowrap;
            font-size: 13px;
            width: 100%;
        }

        [class*=reaction-] {
            border: none;
            background-image: url(http://deividmarques.github.io/facebook-reactions-css/assets/images/facebook-reactions.png);
            background-color: transparent;
            display: block;
            cursor: pointer;
            height: 48px;
            position: absolute;
            width: 48px;
            z-index: 11;
            top: -28;
            transform-origin: 50% 100%;
            transform: scale(0.1);
            transition: all 0.3s;
            outline: none;
            will-change: transform;
            opacity: 0;
        }

        .box {
            position: absolute;
            left: calc(50% - 150px);
            top: calc(50% - 50px);
            width: 300px;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9;
            visibility: hidden;
        }

        .field-reactions:focus~.label-reactions {
            border-color: rgba(88, 144, 255, 0.3);
        }

        .field-reactions:checked:focus~.label-reactions {
            border-color: transparent;
        }

        .label-reactions {
            background: url(https://cdn4.iconfinder.com/data/icons/facebook-likes/100/1.png) no-repeat 0 0;
            border: 2px dotted transparent;
            display: block;
            height: 100px;
            margin: 0 auto;
            width: 100px;
            color: transparent;
            cursor: pointer;
        }

        .toolbox {
            background: #fff;
            height: 52px;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.08), 0 2px 2px rgba(0, 0, 0, 0.15);
            width: 300px;
            border-radius: 40px;
            top: -30px;
            left: 0;
            position: absolute;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.15s;
        }

        .legend-reaction {
            background: rgba(0, 0, 0, 0.75);
            border-radius: 10px;
            box-sizing: border-box;
            color: #fff;
            display: inline-block;
            font-size: 11px;
            text-overflow: ellipsis;
            font-weight: bold;
            line-height: 20px;
            max-width: 100%;
            opacity: 0;
            overflow: hidden;
            padding: 0 6px;
            transition: opacity 50ms ease;
            left: 50%;
            position: absolute;
            text-align: center;
            top: -28px;
            transform: translateX(-50%);
        }

        .box:hover [class*=reaction-] {
            transform: scale(0.8) translateY(-40px);
        }

        .box:hover [class*=reaction-]:hover,
        .box:hover [class*=reaction-]:focus {
            transition: all 0.2s ease-in;
            transform: scale(1) translateY(-35px);
        }

        .box:hover [class*=reaction-]:hover .legend-reaction,
        .box:hover [class*=reaction-]:focus .legend-reaction {
            opacity: 1;
        }

        .box:hover .toolbox {
            opacity: 1;
        }

        .box:hover .toolbox {
            visibility: visible;
        }

        .box:hover .reaction-love {
            transition-delay: 0.06s;
        }

        .box:hover .reaction-haha {
            transition-delay: 0.09s;
        }

        .box:hover .reaction-wow {
            transition-delay: 0.12s;
        }

        .box:hover .reaction-sad {
            transition-delay: 0.15s;
        }

        .box:hover .reaction-angry {
            transition-delay: 0.18s;
        }

        .field-reactions:checked~[class*=reaction-] {
            transform: scale(0.8) translateY(-40px);
        }

        .field-reactions:checked~[class*=reaction-]:hover,
        .field-reactions:checked~[class*=reaction-]:focus {
            transition: all 0.2s ease-in;
            transform: scale(1) translateY(-35px);
        }

        .field-reactions:checked~[class*=reaction-]:hover .legend-reaction,
        .field-reactions:checked~[class*=reaction-]:focus .legend-reaction {
            opacity: 1;
        }

        .field-reactions:checked~.toolbox {
            opacity: 1;
        }

        .field-reactions:checked~.toolbox,
        .field-reactions:checked~.overlay {
            visibility: visible;
        }

        .field-reactions:checked~.reaction-love {
            transition-delay: 0.03s;
        }

        .field-reactions:checked~.reaction-haha {
            transition-delay: 0.09s;
        }

        .field-reactions:checked~.reaction-wow {
            transition-delay: 0.12s;
        }

        .field-reactions:checked~.reaction-sad {
            transition-delay: 0.15s;
        }

        .field-reactions:checked~.reaction-angry {
            transition-delay: 0.18s;
        }

        .reaction-like {
            left: 0;
            background-position: 0 -144px;
        }

        .reaction-love {
            background-position: -48px 0;
            left: 50px;
        }

        .reaction-haha {
            background-position: -96px 0;
            left: 100px;
        }

        .reaction-wow {
            background-position: -144px 0;
            left: 150px;
        }

        .reaction-sad {
            background-position: -192px 0;
            left: 200px;
        }

        .reaction-angry {
            background-position: -240px 0;
            left: 250px;
        }
    </style>
@endsection

@section('content')
    @foreach ($posts as $post)
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-2 mb-4 w-50 mx-auto">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-700">
                    {{ $post->caption }}
                </h2>
            </div>
            <div>
                <p class="text-gray-700 text-base">
                    {{ $post->description }}
                </p>
            </div>
            <div class="border-t-2 mt-4 px-2">
                <ul class="flex justify-between mt-2">
                    {{-- <li><a class="text-sm btn btn-secondary" href="#">React</a></li> --}}
                    <li>
                        <div class="box">
                            <input type="checkbox" id="like" class="field-reactions">
                            <label for="like">React</label>
                            <div class="toolbox"></div>
                            <label class="overlay" for="like"></label>
                            <button class="reaction-like"><span class="legend-reaction">Like</span></button>
                            <button class="reaction-love"><span class="legend-reaction">Love</span></button>
                            <button class="reaction-haha"><span class="legend-reaction">Haha</span></button>
                            <button class="reaction-wow"><span class="legend-reaction">Wow</span></button>
                            <button class="reaction-sad"><span class="legend-reaction">Sad</span></button>
                            <button class="reaction-angry"><span class="legend-reaction">Angry</span></button>
                        </div>
                    </li>
                    <li>
                        <a class="text-sm" data-bs-toggle="collapse" href="#collapseExample_{{ $post->id }}"
                            role="button" aria-expanded="false" aria-controls="collapseExample_{{ $post->id }}">Comment
                        </a>
                    </li>
                </ul>
                <ul class="collapse mt-4" id="collapseExample_{{ $post->id }}"
                    style="max-height: 250px; overflow: auto;">
                    <li class="d-grid p-3">
                        <img src="../assets/img/elements/1.jpg" alt="collapse-image" class="me-4 mb-sm-0 mb-2"
                            height="125" style="max-width: 10%; border-radius: 50%;" />
                        <span class="mt-2">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only
                            five
                            centuries, but also the leap into electronic typesetting, remaining essentially
                            unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                            Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker
                            including
                            versions of Lorem Ipsum.It is a long established fact that a reader will be distracted
                            by
                            the readable content of a page when looking at its layout. The point of using Lorem
                            Ipsum is
                            that it has a more-or-less normal distribution of letters.
                        </span>
                    </li>
                    <li class="d-grid p-3">
                        <img src="../assets/img/elements/1.jpg" alt="collapse-image" class="me-4 mb-sm-0 mb-2"
                            height="125" style="max-width: 10%; border-radius: 50%;" />
                        <span class="mt-2">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only
                            five
                            centuries, but also the leap into electronic typesetting, remaining essentially
                            unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                            Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker
                            including
                            versions of Lorem Ipsum.It is a long established fact that a reader will be distracted
                            by
                            the readable content of a page when looking at its layout. The point of using Lorem
                            Ipsum is
                            that it has a more-or-less normal distribution of letters.
                        </span>
                    </li>
                    <li class="d-grid p-3">
                        <img src="../assets/img/elements/1.jpg" alt="collapse-image" class="me-4 mb-sm-0 mb-2"
                            height="125" style="max-width: 10%; border-radius: 50%;" />
                        <span class="mt-2">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only
                            five
                            centuries, but also the leap into electronic typesetting, remaining essentially
                            unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                            Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker
                            including
                            versions of Lorem Ipsum.It is a long established fact that a reader will be distracted
                            by
                            the readable content of a page when looking at its layout. The point of using Lorem
                            Ipsum is
                            that it has a more-or-less normal distribution of letters.
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    @endforeach
@endsection
