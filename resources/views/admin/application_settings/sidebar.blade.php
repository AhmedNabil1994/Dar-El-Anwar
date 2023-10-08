<div class="email__sidebar bg-style">
    <div class="sidebar__item"  >
        <ul class="sidebar__mail__nav">
            <h2>{{__('الاعدادت العامة')}}</h2>

            <li>
                <a href="{{ route('settings.index') }}" class="list-item {{ @$generalSettingsActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{__('الاعدادت')}}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.icons.index') }}" class="list-item {{ @$bbbSettingsActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{__('اعدادت الايقونات')}}</span>
                </a>
            </li>



        </ul>
    </div>


</div>
