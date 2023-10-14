@props(['data', 'key'])

<div class="row wow fadeInUp" data-wow-delay="100ms">
    <div class="col">
        <h4 class="title">@lang($data['title'])</h4>
        <div class="accordion-style1">
            <div class="accordion" id="accordion-{{ $key }}">
                @foreach ($data['pairs'] as $pair)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ $key }}-{{ $loop->index }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{ $key }}-{{ $loop->index }}" aria-expanded="false"
                                aria-controls="collapse-{{ $key }}-{{ $loop->index }}">
                                @lang($pair['question'])
                            </button>
                        </h2>
                        <div id="collapse-{{ $key }}-{{ $loop->index }}" class="accordion-collapse collapse"
                            aria-labelledby="heading-{{ $key }}-{{ $loop->index }}"
                            data-bs-parent="#accordion-{{ $key }}">
                            <div class="accordion-body">
                                @if (is_array($pair['answer']))
                                    @foreach ($pair['answer'] as $an)
                                        @if (is_array($an))
                                            @if (isset($an['title']))
                                                <h5 class="my-2">@lang($an['title'])</h5>
                                            @endif
                                            @if (isset($an['p']))
                                                <p class="my-2">@lang($an['p'])</p>
                                            @endif
                                            @foreach ($an['li'] as $li)
                                                <li class="list-style1 mb-1 ms-2">
                                                    <i class="far {{ isset($an['icon']) ? $an['icon'] : '' }}  text-white fz20 mt-1"></i>
                                                    <p class="ms-4"> @lang($li) </p>
                                                </li>
                                            @endforeach
                                        @else
                                            <p class="mb-0">@lang($an)</p>
                                        @endif
                                    @endforeach
                                @else
                                    @lang($pair['answer'])
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
