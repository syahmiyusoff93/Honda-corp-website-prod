@php

@endphp
@extends('layouts.base')

@php
    $metadata['title'] = $item->title;
    $metadata['description'] = $item->short_desc;
    $metadata['keywords'] = 'honda, honda Malaysia, malaysia automotive, power of dreams, car dealer, car showroom, car model, test drive' . @$item->keywords;
    $metadata['image'] = $item->thumb;
@endphp

@section('page-meta')
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$metadata['title']}}" />
    <meta property="og:description" content="{{$metadata['description']}}" />
    <meta property="og:image" content="{{$metadata['image']}}" />
    <meta name="description" content="{{$metadata['description']}}"/>
    <meta name="keywords" content="{{$metadata['keywords']}}"/>
@stop


@section('page-title')
    {{$item->title}} | Happening
@stop
@section('content')

<div class="body-wrapper">
    <section class="content-inner happening-content-details">
        <div class="inner-content-section content-area">
            <h2>{!! $item->title !!}</h2>
            <div class="content-copy">{!! $item->short_desc !!}</div>
            <div class="clearfix"></div>
        </div>

        <div class="happening-content-container">
            <div class="for-desktop">
                {!!$item->content!!}
            </div>

            <div class="for-mobile">
                {!!$item->content_mobile!!}
            </div>
        </div>

    </section>

    <section class="shopping-tools body-copy grey container section-gap" id="shopping-tools" style="padding-top: 40px; margin-top: 40px;padding-bottom: 40px; margin-bottom: 40px;">
        <h2>SHOPPING TOOLS</h2>
        @include('components.shopping-tools')
        <div class="clearfix"></div>
    </section>


    <script>

        $(document).ready(function(){
            if (window.location.href.includes('/95/')) {
                $("h2:contains('Service Win Prosperity')").html("The Results Are In!");
            }

            if (window.location.href.includes('/97/')) {
                $(document.querySelector("#mainstage > div > section > div.inner-content-section.content-area > div.content-copy")).html("Now open for booking.");
            }

            $("h2:contains('The All-New City Hatchback V-SENSING, Most Complete')").html("The All-New City Hatchback V&#8209;SENSING, Most Complete");
            
            $('.happening-tab-header').click(function(){
                var tabname = $(this).data('happening-tab-name');
                $(this).siblings('.happening-tab-header').removeClass('active')
                $(this).addClass('active');

                $(this).siblings('.happening-tab-content').hide();
                $(this).siblings('.happening-tab-content').each(function(){
                    if($(this).data('happening-tab-name')==tabname){
                        $(this).show();
                    }
                })
                console.log('>>', $(this))
            })

            $('.happening-tab-header:nth-of-type(1)').trigger('click');

            // Collapsible Car Section Handler - for both old and new templates
            // - Expanded: arrow points UP (rotate 180deg)
            // - Collapsed: arrow points DOWN (rotate 0deg)
            // - Mobile: default collapsed, multiple cards can be expanded (no auto-close/reorder/scroll)
            function setDisplayImportant($el, value) {
                if (!$el || !$el.length) return;
                const node = $el.get(0);
                if (!node || !node.style) return;
                node.style.setProperty('display', value, 'important');
            }

            function applyCardPadding($wrapper, isExpanded) {
                if (!$wrapper || !$wrapper.length) return;
                const $header = $wrapper.find('.individual-car-header').first();
                const $content = $wrapper.find('.individual-car-content').first();

                const positionArrowInPadding = (expanded) => {
                    const arrowEl = $wrapper.find('.collapse-arrow').get(0);
                    if (!arrowEl) return;

                    const targetEl = expanded ? $content.get(0) : $header.get(0);
                    if (!targetEl) return;

                    // Move arrow into the element whose padding we want to use.
                    if (arrowEl.parentElement !== targetEl) {
                        targetEl.appendChild(arrowEl);
                    }

                    // Ensure positioning context.
                    const curPos = window.getComputedStyle(targetEl).position;
                    if (curPos === 'static') targetEl.style.position = 'relative';

                    const targetStyles = window.getComputedStyle(targetEl);
                    const paddingBottom = parseFloat(targetStyles.paddingBottom) || 0;
                    const arrowStyles = window.getComputedStyle(arrowEl);
                    const arrowSize = parseFloat(arrowStyles.height) || 0;
                    const offset = Math.max(0, (paddingBottom - arrowSize) / 2);

                    arrowEl.style.position = 'absolute';
                    arrowEl.style.left = '50%';
                    arrowEl.style.transform = 'translateX(-50%)';
                    arrowEl.style.bottom = `${offset}px`;
                    arrowEl.style.zIndex = '5';
                };

                const getCollapsePadPx = () => {
                    const node = $wrapper.get(0);
                    if (!node) return 85;
                    const raw = (node.style && node.style.getPropertyValue('--collapse-pad'))
                        || window.getComputedStyle(node).getPropertyValue('--collapse-pad');
                    const parsed = parseFloat(raw);
                    return Number.isFinite(parsed) ? parsed : 85;
                };

                const pad = getCollapsePadPx();

                if (isExpanded) {
                    $header.css('padding-bottom', '25px');
                    $content.css('padding-bottom', `${pad}px`);
                    positionArrowInPadding(true);
                } else {
                    $header.css('padding-bottom', `${pad}px`);
                    $content.css('padding-bottom', '20px');
                    positionArrowInPadding(false);
                }
            }

            $(document).on('click', '[data-toggle="collapse-section"], .collapse-arrow', function(e) {
                if ($(this).hasClass('collapse-arrow')) {
                    e.stopPropagation();
                }

                // Old template
                const legacySection = $(this).closest('.collapsible-car-section');
                if (legacySection.length > 0) {
                    const legacyHeader = $(this);
                    const legacyContent = legacySection.find('.car-content');
                    const legacyIcon = legacyHeader.find('.toggle-icon');

                    if (legacyContent.is(':hidden')) {
                        legacyContent.slideDown(300);
                        legacyIcon.css('transform', 'rotate(180deg)');
                    } else {
                        legacyContent.slideUp(300);
                        legacyIcon.css('transform', 'rotate(0deg)');
                    }
                    return;
                }

                // New template
                const wrapper = $(this).closest('.car-card-wrapper');
                if (!wrapper.length) return;

                const header = $(this).hasClass('collapse-arrow')
                    ? wrapper.find('.individual-car-header').first()
                    : $(this);

                const content = header.next('.individual-car-content');
                const arrow = wrapper.find('.collapse-arrow svg');

                const isMobile = $(window).width() <= 768;

                if (content.is(':hidden')) {
                    // Expanding
                    header.css('border-bottom-right-radius', '0px');
                    header.css('border-bottom-left-radius', '0px');
                    if (arrow.length) arrow.css('transform', 'rotate(180deg)');

                    if (isMobile) {
                        // Mobile: show immediately (works even with legacy !important styles)
                        setDisplayImportant(content, 'block');

                        applyCardPadding(wrapper, true);

                        // Mobile only: expanded card becomes full width
                        wrapper.addClass('mobile-active');

                        // Mobile only: scroll to expanded card
                        const node = wrapper.get(0);
                        if (node && typeof node.scrollIntoView === 'function') {
                            // Wait a tick so layout reflects mobile-active + content display
                            setTimeout(function() {
                                node.scrollIntoView({ behavior: 'smooth', block: 'start' });
                            }, 50);
                        }
                    } else {
                        // Desktop: animate expand (0.5s)
                        // Move/position arrow for expanded state before animation so it expands together.
                        applyCardPadding(wrapper, true);
                        content.stop(true, true).slideDown(500);
                    }
                } else {
                    // Collapsing
                    if (arrow.length) arrow.css('transform', 'rotate(0deg)');
                    wrapper.removeClass('mobile-active');

                    if (isMobile) {
                        // Mobile: hide immediately
                        setDisplayImportant(content, 'none');
                        header.css('border-radius', '40px');

                        // Move/position arrow for collapsed state immediately.
                        applyCardPadding(wrapper, false);
                    } else {
                        // Desktop: animate collapse (0.5s)
                        // Keep arrow inside the content while it collapses, then move to header at the end.
                        applyCardPadding(wrapper, true);
                        content.stop(true, true).slideUp(500, function() {
                            header.css('border-radius', '40px');
                            applyCardPadding(wrapper, false);
                        });
                    }
                }
            });

            // Mobile default: start collapsed (allow multi-expand)
            if ($(window).width() <= 768) {
                $('.car-card-wrapper').each(function() {
                    const w = $(this);
                    const c = w.find('.individual-car-content').first();
                    setDisplayImportant(c, 'none');
                    w.find('.individual-car-header').first().css('border-radius', '40px');
                    w.find('.collapse-arrow svg').css('transform', 'rotate(0deg)');
                    w.removeClass('mobile-active');
                    applyCardPadding(w, false);
                });
            } else {
                // Desktop default: expanded
                $('.car-card-wrapper').each(function() {
                    const w = $(this);
                    const c = w.find('.individual-car-content').first();
                    setDisplayImportant(c, 'block');
                    w.find('.individual-car-header').first().css('border-bottom-right-radius', '0px');
                    w.find('.individual-car-header').first().css('border-bottom-left-radius', '0px');
                    w.find('.collapse-arrow svg').css('transform', 'rotate(180deg)');
                    w.removeClass('mobile-active');
                    applyCardPadding(w, true);
                });
            }

            // Recalculate arrow position on resize (padding may change with breakpoints)
            $(window).on('resize', function() {
                $('.car-card-wrapper').each(function() {
                    const w = $(this);
                    const content = w.find('.individual-car-content').first();
                    applyCardPadding(w, !content.is(':hidden'));
                });
            });

        })
    </script>
    <style>
        .tab-content {display: none;}
        .collapse-arrow { cursor: pointer; }
    </style>

</div>

@stop
{{--

        SAI 20200818:
    This is a section to inject script/custom code to the very beginning right after opening of <body>

--}}
@section('body-top')
    @if ($item->id==17)
        {{-- <!--
        Start of Floodlight Tag: Please do not remove
        Activity name of this tag: Honda City Launch_Landing URL_V2
        URL of the webpage where the tag is expected to be placed:
        This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
        Creation Date: 08/14/2020
        --> --}}
        <script type="text/javascript">
            var axel = Math.random() + "";
            var a = axel * 10000000000000;
            document.write('<iframe src="https://9800367.fls.doubleclick.net/activityi;src=9800367;type=invmedia;cat=honda00;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;gdpr=;gdpr_consent=${gdpr_consent_755};ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
            </script>
            <noscript>
            <iframe src="https://9800367.fls.doubleclick.net/activityi;src=9800367;type=invmedia;cat=honda00;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;gdpr=;gdpr_consent=${gdpr_consent_755};ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
            </noscript>
            <!-- End of Floodlight Tag: Please do not remove -->

    @endif
@endsection

