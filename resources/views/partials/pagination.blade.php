<p class="py-4 text-center text-grey-dark">Showing {{ number_format(count($properties->data)) }} of {{ number_format($properties->total) }} results</p>
<ul class="list-reset flex justify-center my-2">
    <li class="mr-2">
        <button class="text-white bg-brand px-4 py-2 text-center cursor-pointer shadow rounded-l border border-brand"
                {{-- {{ (isset($_GET['pg']) ? $_GET['pg'] : 1) != 1 ? 'href="/property-search/&pg=1"' : 'disabled' }} --}}

        >
            First
        </button>
    </li>
    <li class="mr-2">
        <button class="text-white bg-brand px-4 py-2 text-center cursor-pointer shadow border border-brand"
            {{-- {{ (isset($_GET['pg']) ? $_GET['pg'] : 1) != 1 ? 'href="/property-search/&pg='.((isset($_GET['pg']) ? $_GET['pg'] : 1) - 1).'"' : 'disabled' }} --}}
        >
            Prev
        </button>
    </li>
    <li class="mr-2">
        <a class="text-grey bg-white px-4 py-2 text-center flex shadow items-center border border-grey ">
            {{ (isset($_GET['pg']) ? $_GET['pg'] : 1) }}
        </a>
    </li>
    <li class="mr-2">
        <button class="text-white bg-brand px-4 py-2 text-center cursor-pointer shadow border border-brand"
            {{-- {{ $properties->last_page != 1 ? 'href="/property-search/&pg='.((isset($_GET['pg']) ? $_GET['pg'] : 1) + 1).'"' : 'disabled' }} --}}
        >
            Next
        </button>
    </li>
    <li class="mr-2">
        <button class="text-white bg-brand px-4 py-2 text-center cursor-pointer shadow rounded-r border border-brand"
                {{-- {{ $properties->last_page != 1 ? 'href="/property-search/&pg='.$properties->last_page.'"' : 'disabled' }} --}}
        >
            Last
        </button>
    </li>
</ul>