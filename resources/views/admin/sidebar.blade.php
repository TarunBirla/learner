<div class="sidebar">

<h4 class="text-center py-3 border-bottom">
  Learner Admin
</h4>

<a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
 Dashboard
</a>

<a href="/admin/courses" class="{{ request()->is('admin/courses*') ? 'active' : '' }}">
 Courses
</a>

<a href="/admin/blogs" class="{{ request()->is('admin/blogs*') ? 'active' : '' }}">
 Blogs
</a>

<a href="/admin/instructors" class="{{ request()->is('admin/instructors*') ? 'active' : '' }}">
 Instructors
</a>

<a href="/admin/settings" class="{{ request()->is('admin/settings*') ? 'active' : '' }}">
 Settings
</a>

<hr>

<a href="/" class="text-warning">
 Visit Website
</a>

</div>
