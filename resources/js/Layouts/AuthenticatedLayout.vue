<script setup>
import { ref, computed } from 'vue'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'
import NavLink from '@/Components/NavLink.vue'
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import {
    Link,
    usePage,
} from '@inertiajs/vue3'

const showingNavigationDropdown =
    ref(false)

const page = usePage()

const user = computed(() => {
    return page.props.auth?.user
})
</script>

<template>
    <div class="min-h-screen bg-gray-100">

        <nav
            class="
                border-b
                border-gray-100
                bg-white
            "
        >
            <div
                class="
                    mx-auto
                    max-w-7xl
                    px-4
                    sm:px-6
                    lg:px-8
                "
            >
                <div
                    class="
                        flex
                        h-16
                        justify-between
                    "
                >
                    <!-- LEFT -->
                    <div class="flex">

                        <div
                            class="
                                flex
                                shrink-0
                                items-center
                            "
                        >
                            <Link
                                :href="
                                    route('home')
                                "
                            >
                                <ApplicationLogo
                                    class="
                                        block
                                        h-9
                                        w-auto
                                        fill-current
                                        text-gray-800
                                    "
                                />
                            </Link>
                        </div>

                        <div
                            class="
                                hidden
                                sm:ms-10
                                sm:flex
                                sm:space-x-8
                            "
                        >

                            <!-- USER -->
                            <template
                                v-if="
                                    user?.role ===
                                    'user'
                                "
                            >
                                <NavLink
                                    :href="
                                        route(
                                            'home'
                                        )
                                    "
                                >
                                    Home
                                </NavLink>

                                <NavLink
                                    :href="
                                        route(
                                            'booking.index'
                                        )
                                    "
                                >
                                    My Booking
                                </NavLink>

                                <NavLink
                                    :href="
                                        route(
                                            'user.dashboard'
                                        )
                                    "
                                >
                                    Loyalty
                                </NavLink>
                            </template>

                            <!-- ADMIN -->
                            <template
                                v-if="
                                    user?.role ===
                                    'admin'
                                "
                            >
                                <NavLink
                                    :href="
                                        route(
                                            'admin.dashboard'
                                        )
                                    "
                                >
                                    Dashboard
                                </NavLink>

                                <NavLink
                                    :href="
                                        route(
                                            'admin.bookings'
                                        )
                                    "
                                >
                                    Booking
                                </NavLink>

                                <NavLink
                                    :href="
                                        route(
                                            'admin.packages.index'
                                        )
                                    "
                                >
                                    Paket
                                </NavLink>

                                <NavLink
                                    :href="
                                        route(
                                            'admin.schedules.index'
                                        )
                                    "
                                >
                                    Jadwal
                                </NavLink>
                            </template>

                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div
                        v-if="user"
                        class="
                            hidden
                            sm:flex
                            sm:items-center
                        "
                    >
                        <Dropdown
                            align="right"
                            width="48"
                        >

                            <template #trigger>

                                <button
                                    class="
                                        inline-flex
                                        items-center
                                        rounded-md
                                        border
                                        border-transparent
                                        bg-white
                                        px-3
                                        py-2
                                        text-sm
                                        text-gray-500
                                    "
                                >
                                    {{ user.name }}

                                    <svg
                                        class="
                                            ms-2
                                            h-4
                                            w-4
                                        "
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>

                            </template>

                            <template #content>

                                <DropdownLink
                                    :href="
                                        route(
                                            'profile.edit'
                                        )
                                    "
                                >
                                    Profile
                                </DropdownLink>

                                <DropdownLink
                                    :href="
                                        route(
                                            'logout'
                                        )
                                    "
                                    method="post"
                                    as="button"
                                >
                                    Log Out
                                </DropdownLink>

                            </template>

                        </Dropdown>
                    </div>

                    <!-- MOBILE -->
                    <div
                        class="
                            -me-2
                            flex
                            items-center
                            sm:hidden
                        "
                    >
                        <button
                            @click="
                                showingNavigationDropdown =
                                    !showingNavigationDropdown
                            "
                            class="
                                inline-flex
                                items-center
                                justify-center
                                rounded-md
                                p-2
                                text-gray-400
                            "
                        >
                            ☰
                        </button>
                    </div>

                </div>
            </div>

            <!-- MOBILE MENU -->
            <div
                :class="{
                    block:
                        showingNavigationDropdown,
                    hidden:
                        !showingNavigationDropdown,
                }"
                class="sm:hidden"
            >

                <div
                    class="
                        space-y-1
                        pt-2
                        pb-3
                    "
                >
                    <ResponsiveNavLink
                        :href="
                            route('home')
                        "
                    >
                        Home
                    </ResponsiveNavLink>

                    <ResponsiveNavLink
                        v-if="
                            user?.role ===
                            'user'
                        "
                        :href="
                            route(
                                'booking.index'
                            )
                        "
                    >
                        My Booking
                    </ResponsiveNavLink>

                    <ResponsiveNavLink
                        v-if="
                            user?.role ===
                            'user'
                        "
                        :href="
                            route(
                                'user.dashboard'
                            )
                        "
                    >
                        Loyalty
                    </ResponsiveNavLink>

                    <ResponsiveNavLink
                        v-if="
                            user?.role ===
                            'admin'
                        "
                        :href="
                            route(
                                'admin.dashboard'
                            )
                        "
                    >
                        Dashboard
                    </ResponsiveNavLink>

                    <ResponsiveNavLink
                        v-if="
                            user?.role ===
                            'admin'
                        "
                        :href="
                            route(
                                'admin.bookings'
                            )
                        "
                    >
                        Booking
                    </ResponsiveNavLink>

                    <ResponsiveNavLink
                        v-if="
                            user?.role ===
                            'admin'
                        "
                        :href="
                            route(
                                'admin.packages.index'
                            )
                        "
                    >
                        Paket
                    </ResponsiveNavLink>

                    <ResponsiveNavLink
                        v-if="
                            user?.role ===
                            'admin'
                        "
                        :href="
                            route(
                                'admin.schedules.index'
                            )
                        "
                    >
                        Jadwal
                    </ResponsiveNavLink>
                </div>

                <div
                    v-if="user"
                    class="
                        border-t
                        border-gray-200
                        pt-4
                        pb-1
                    "
                >
                    <div
                        class="px-4"
                    >
                        <div
                            class="
                                text-base
                                font-medium
                                text-gray-800
                            "
                        >
                            {{ user.name }}
                        </div>

                        <div
                            class="
                                text-sm
                                text-gray-500
                            "
                        >
                            {{ user.email }}
                        </div>
                    </div>

                    <div
                        class="
                            mt-3
                            space-y-1
                        "
                    >
                        <ResponsiveNavLink
                            :href="
                                route(
                                    'profile.edit'
                                )
                            "
                        >
                            Profile
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            :href="
                                route(
                                    'logout'
                                )
                            "
                            method="post"
                            as="button"
                        >
                            Log Out
                        </ResponsiveNavLink>
                    </div>
                </div>

            </div>
        </nav>

        <header
            v-if="$slots.header"
            class="
                bg-white
                shadow
            "
        >
            <div
                class="
                    mx-auto
                    max-w-7xl
                    px-4
                    py-6
                    sm:px-6
                    lg:px-8
                "
            >
                <slot
                    name="header"
                />
            </div>
        </header>

        <main>
            <slot />
        </main>

    </div>
</template>