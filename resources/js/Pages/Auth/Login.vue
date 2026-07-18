<script setup>
import Checkbox from '@/Components/Checkbox.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

defineProps({
    canResetPassword: Boolean,
    status: String,
})

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

function submit() {
    form.post(route('login'), {
        onFinish: () =>
            form.reset('password'),
    })
}
</script>

<template>
<GuestLayout>
    <Head title="Login" />

    <div class="mb-8 text-center">

        <h1
            class="
                text-3xl
                font-bold
                text-gray-800
            "
        >
            Selamat Datang
        </h1>

        <p
            class="
                mt-2
                text-sm
                text-gray-500
            "
        >
            Masuk untuk melanjutkan
            perjalanan Anda bersama
            Travelku.
        </p>

    </div>

    <div
        v-if="status"
        class="
            mb-5
            rounded-xl
            bg-green-100
            p-4
            text-sm
            text-green-700
        "
    >
        {{ status }}
    </div>

    <form
        @submit.prevent="submit"
        class="space-y-5"
    >
        <div>
            <InputLabel
                value="Email"
            />

            <TextInput
                type="email"
                v-model="
                    form.email
                "
                class="
                    mt-1
                    block
                    w-full
                "
                required
                autofocus
            />

            <InputError
                class="mt-2"
                :message="
                    form.errors.email
                "
            />
        </div>

        <div>
            <InputLabel
                value="Password"
            />

            <TextInput
                type="password"
                v-model="
                    form.password
                "
                class="
                    mt-1
                    block
                    w-full
                "
                required
            />

            <InputError
                class="mt-2"
                :message="
                    form.errors.password
                "
            />
        </div>

        <div
            class="
                flex
                items-center
                justify-between
            "
        >
            <label
                class="
                    flex
                    items-center
                    text-sm
                    text-gray-600
                "
            >
                <Checkbox
                    v-model:checked="
                        form.remember
                    "
                />

                <span class="ml-2">
                    Ingat Saya
                </span>
            </label>

            <Link
                v-if="
                    canResetPassword
                "
                :href="
                    route(
                        'password.request'
                    )
                "
                class="
                    text-sm
                    text-blue-600
                    hover:underline
                "
            >
                Lupa Password?
            </Link>
        </div>

        <PrimaryButton
            class="
                w-full
                justify-center
            "
            :disabled="
                form.processing
            "
        >
            Login
        </PrimaryButton>

        <div
            class="
                border-t
                pt-5
                text-center
                text-sm
                text-gray-600
            "
        >
            Belum memiliki akun?

            <Link
                :href="
                    route(
                        'register'
                    )
                "
                class="
                    font-semibold
                    text-blue-600
                    hover:underline
                "
            >
                Daftar Sekarang
            </Link>
        </div>

    </form>
</GuestLayout>
</template>