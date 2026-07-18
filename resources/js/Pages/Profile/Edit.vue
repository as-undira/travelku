<script setup>
import { computed } from 'vue'
import DeleteUserForm from './Partials/DeleteUserForm.vue'
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue'
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue'
import {
    Head,
    Link,
    usePage,
    router
} from '@inertiajs/vue3'

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
})

const page = usePage()

const user = computed(() =>
    page.props.auth?.user ?? {}
)

const logout = () => {
    router.post(
        route('logout')
    )
}

const backRoute = computed(() =>
    user.value.role === 'admin'
        ? route('admin.dashboard')
        : route('home')
)

const birthDate = computed(() => {
    if (!user.value.birth_date)
        return '-'

    return new Date(
        user.value.birth_date
    ).toLocaleDateString(
        'id-ID',
        {
            day: 'numeric',
            month: 'long',
            year: 'numeric',
        }
    )
})
</script>

<template>
<Head title="Profile" />

<div class="min-h-screen bg-slate-100">

    <nav
        class="
            border-b
            bg-white
            shadow-sm
        "
    >
        <div
            class="
                mx-auto
                flex
                max-w-7xl
                items-center
                justify-between
                px-6
                py-5
            "
        >

            <!-- LEFT -->
            <div
                class="
                    flex
                    items-center
                    gap-10
                "
            >
                <Link
                    :href="
                        user.role ===
                        'admin'
                            ? route(
                                'admin.dashboard'
                            )
                            : route(
                                'home'
                            )
                    "
                    class="
                        text-2xl
                        font-bold
                        text-blue-600
                    "
                >
                    Travelku
                </Link>

                <template
                    v-if="
                        user.role ===
                        'admin'
                    "
                >

                </template>

                <template
                    v-else
                >
                    <Link
                        :href="
                            route('home')
                        "
                    >
                        Home
                    </Link>

                    <Link
                        :href="
                            route(
                                'booking.index'
                            )
                        "
                    >
                        Booking
                    </Link>

                    <Link
                        :href="
                            route(
                                'loyalty.index'
                            )
                        "
                    >
                        Loyalty
                    </Link>
                </template>
            </div>

            <!-- RIGHT -->
            <div
                class="
                    flex
                    items-center
                    gap-6
                "
            >
                <span
                    class="
                        font-medium
                    "
                >
                    {{
                        user.name
                    }}
                </span>

                <button
                    @click="
                        logout
                    "
                    class="
                        rounded-xl
                        bg-red-500
                        px-4
                        py-2
                        text-white
                    "
                >
                    Logout
                </button>
            </div>

        </div>
    </nav>

    <!-- HERO -->
    <section
        class="
            bg-gradient-to-r
            from-blue-700
            via-sky-500
            to-cyan-400
        "
    >
        <div
            class="
                mx-auto
                max-w-7xl
                px-6
                py-16
            "
        >

            <Link
                :href="
                    backRoute
                "
                class="
                    mb-8
                    inline-flex
                    rounded-xl
                    bg-white/10
                    px-5
                    py-2
                    text-white
                    backdrop-blur
                "
            >
                ← Kembali
            </Link>

            <h1
                class="
                    text-5xl
                    font-bold
                    text-white
                "
            >
                Profil Saya
            </h1>

            <p
                class="
                    mt-4
                    text-xl
                    text-blue-100
                "
            >
                Kelola informasi akun
                dan pengaturan profil.
            </p>

        </div>
    </section>

    <div
        class="
            mx-auto
            -mt-8
            max-w-7xl
            space-y-8
            px-6
            pb-16
        "
    >

        <!-- PROFILE CARD -->
        <div
            class="
                rounded-3xl
                bg-white
                p-8
                shadow-xl
            "
        >
            <div
                class="
                    flex
                    flex-col
                    gap-6
                    md:flex-row
                    md:items-center
                "
            >
                <div
                    class="
                        flex
                        h-28
                        w-28
                        items-center
                        justify-center
                        rounded-full
                        bg-slate-200
                        text-5xl
                        font-bold
                        text-slate-600
                    "
                >
                    {{
                        user.name?.charAt(0)
                    }}
                </div>

                <div>
                    <h2
                        class="
                            text-4xl
                            font-bold
                        "
                    >
                        {{ user.name }}
                    </h2>

                    <p
                        class="
                            mt-2
                            text-gray-500
                        "
                    >
                        {{ user.email }}
                    </p>

                    <p
                        class="
                            mt-4
                            text-lg
                            font-semibold
                            text-amber-700
                        "
                    >
                        {{
                            loyaltyName
                        }}
                        Member
                    </p>
                </div>
            </div>
        </div>

        <!-- INFO -->
        <div
            class="
                grid
                gap-8
                lg:grid-cols-2
            "
        >

            <!-- PERSONAL -->
            <div
                class="
                    rounded-3xl
                    bg-white
                    p-8
                    shadow-xl
                "
            >
                <h3
                    class="
                        mb-8
                        text-3xl
                        font-bold
                    "
                >
                    Informasi Pribadi
                </h3>

                <div
                    class="
                        space-y-6
                    "
                >
                    <div>
                        <p class="text-gray-500">
                            Nomor Telepon
                        </p>

                        <p
                            class="
                                mt-1
                                text-lg
                                font-semibold
                            "
                        >
                            {{
                                user.phone
                            }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">
                            Jenis Kelamin
                        </p>

                        <p
                            class="
                                mt-1
                                text-lg
                                font-semibold
                            "
                        >
                            {{
                                user.gender === 'L'
                                    ? 'Laki-Laki'
                                    : 'Perempuan'
                            }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">
                            Tanggal Lahir
                        </p>

                        <p
                            class="
                                mt-1
                                text-lg
                                font-semibold
                            "
                        >
                            {{ birthDate }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- LOYALTY -->
            <div
                class="
                    rounded-3xl
                    bg-white
                    p-8
                    shadow-xl
                "
            >

                <template
                    v-if="
                        user.role ===
                        'user'
                    "
                >
                    <h3
                        class="
                            mb-8
                            text-3xl
                            font-bold
                        "
                    >
                        Loyalty
                        Information
                    </h3>

                    <div
                        class="
                            space-y-6
                        "
                    >
                        <div>
                            <p class="text-gray-500">
                                Total Distance
                            </p>

                            <p
                                class="
                                    text-4xl
                                    font-bold
                                "
                            >
                                {{
                                    Number(
                                        user.total_distance ?? 0
                                    ).toLocaleString(
                                        'id-ID'
                                    )
                                }}
                                KM
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500">
                                Discount
                            </p>

                            <p
                                class="
                                    text-3xl
                                    font-bold
                                    text-blue-600
                                "
                            >
                                {{
                                    user.discount_percentage
                                }}%
                            </p>
                        </div>
                    </div>
                </template>

                <template v-else>

                    <h3
                        class="
                            mb-8
                            text-3xl
                            font-bold
                        "
                    >
                        Administrator
                    </h3>

                    <div
                        class="
                            space-y-4
                            text-lg
                        "
                    >
                        <p>• Booking Management</p>
                        <p>• Package Management</p>
                        <p>• Schedule Management</p>
                        <p>• Loyalty Monitoring</p>
                    </div>

                </template>

            </div>

        </div>

        <!-- EDIT PROFILE -->
        <div
            class="
                rounded-3xl
                bg-white
                p-10
                shadow-xl
            "
        >
            <h2
                class="
                    mb-8
                    text-3xl
                    font-bold
                "
            >
                Edit Profile
            </h2>

            <UpdateProfileInformationForm
                :must-verify-email="
                    mustVerifyEmail
                "
                :status="status"
            />
        </div>

        <!-- PASSWORD -->
        <div
            class="
                rounded-3xl
                bg-white
                p-10
                shadow-xl
            "
        >
            <h2
                class="
                    mb-8
                    text-3xl
                    font-bold
                "
            >
                Update Password
            </h2>

            <UpdatePasswordForm />
        </div>

        <!-- DELETE -->
        <div
            class="
                rounded-3xl
                border
                border-red-100
                bg-white
                p-10
                shadow-xl
            "
        >
            <h2
                class="
                    mb-8
                    text-3xl
                    font-bold
                    text-red-600
                "
            >
                Delete Account
            </h2>

            <DeleteUserForm />
        </div>

    </div>

</div>
</template>