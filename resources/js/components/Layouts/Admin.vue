<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link class="navbar-brand" to="/admin/dashboard"
                >Admin</router-link
            >
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/admin/student"
                            >นักเรียน</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/admin/college"
                            >มหาลัย</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/admin/course"
                            >คอร์ส</router-link
                        >
                    </li>
                </ul>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
export default {};
</script>
