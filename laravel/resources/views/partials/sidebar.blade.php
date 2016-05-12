@section("sidebar")

<li class="nav-item start<?php if ($selected=='dashboard') echo ' active'; ?>">
    <a href="/" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
    </a>
</li>
<li class="nav-item start<?php if ($selected=='cases') echo ' active'; ?>">
    <a href="/cases" class="nav-link nav-toggle">
        <i class="icon-briefcase"></i>
        <span class="title">Cases</span>
    </a>
</li>
<!--li class="nav-item start<?php if ($selected=='users') echo ' active'; ?>">
    <a href="/users" class="nav-link nav-toggle">
        <i class="icon-layers"></i>
        <span class="title">Users</span>
    </a>
</li>
<li class="nav-item start<?php if ($selected=='files') echo ' active'; ?>">
    <a href="/files" class="nav-link nav-toggle">
        <i class="icon-docs"></i>
        <span class="title">Documents</span>
    </a>
</li>
<li class="nav-item start<?php if ($selected=='contacts') echo ' active'; ?>">
    <a href="/contacts" class="nav-link nav-toggle">
        <i class="icon-notebook"></i>
        <span class="title">Contacts</span>
    </a>
</li-->

<li class="heading">
    <h3 class="uppercase">My Account</h3>
</li>
<!--li class="nav-item start<?php if ($selected=='actions') echo ' active'; ?>">
    <a href="/actions" class="nav-link nav-toggle">
        <i class="icon-list"></i>
        <span class="title">Action Items</span>
    </a>
</li>
<li class="nav-item start<?php if ($selected=='calendar') echo ' active'; ?>">
    <a href="/calendar" class="nav-link nav-toggle">
        <i class="icon-calendar"></i>
        <span class="title">Calendar</span>
    </a>
</li-->
<li class="nav-item start<?php if ($selected=='profile') echo ' active'; ?>">
    <a href="/profile" class="nav-link nav-toggle">
        <i class="icon-user"></i>
        <span class="title">Profile</span>
    </a>
</li>

@endsection