<div>

    <!-- admin credentials can be access using this;-->
    @if(auth('jwt')->user()->name != null)
        {{auth('jwt')->user()->name}}
        <br>
    @endif

    <!-- admin credentials can be access using this;-->
    @can('cms', auth('jwt')->user())
        <div style="font-size: 1rem; font-weight: bold">CMS</div>
    @endcan


    Admin Dashboard
    @if($role === 'superadmin')
        <h2>Super Admin Features</h2>
        <h5>{{$name}}</h5>
        <ul>
            <li>Manage System Settings</li>
            <li>Create and Manage Admin Accounts</li>
        </ul>
    @endif

    @if($role === 'normaladmin')
        <h2>Admin Features</h2>
        <ul>
            <li>Manage User Accounts</li>
            <li>Create and Manage Products</li>
        </ul>
    @endif

    @if($role === 'creator')
        <h2>Creator Features</h2>
        <ul>
            <li>Create and Manage Content</li>
            <li>View Analytics and Metrics</li>
        </ul>
    @endif

    <button wire:click="logout" class="border-2 my-6">LOgout</button>
</div>
