<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import {
    Head,
    Link,
    useForm,
} from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    phone: '',
    gender: '',
    birth_date: '',
    password: '',
    password_confirmation: '',
})

function submit() {
    form.post(
        route('register'),
        {
            onFinish: () =>
                form.reset(
                    'password',
                    'password_confirmation'
                ),
        }
    )
}
</script>

<template>
<GuestLayout>

    <Head title="Register" />

    <div class="mb-8 text-center">

        <h1
            class="
                text-3xl
                font-bold
                text-gray-800
            "
        >
            Buat Akun Travelku
        </h1>

        <p
            class="
                mt-2
                text-sm
                text-gray-500
            "
        >
            Daftar untuk mulai
            menjelajahi berbagai
            destinasi wisata.
        </p>

    </div>

    <form
        @submit.prevent="submit"
        class="space-y-5"
    >
        <div>
            <InputLabel value="Nama" />

            <TextInput
                v-model="form.name"
                class="
                    mt-1
                    block
                    w-full
                "
            />

            <InputError
                class="mt-2"
                :message="
                    form.errors.name
                "
            />
        </div>

        <div>
            <InputLabel value="Email" />

            <TextInput
                type="email"
                v-model="form.email"
                class="
                    mt-1
                    block
                    w-full
                "
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
                value="No. Telepon"
            />

            <TextInput
                v-model="form.phone"
                class="
                    mt-1
                    block
                    w-full
                "
            />

            <InputError
                class="mt-2"
                :message="
                    form.errors.phone
                "
            />
        </div>

        <div>
            <InputLabel
                value="Jenis Kelamin"
            />

            <select
                v-model="
                    form.gender
                "
                class="
                    mt-1
                    block
                    w-full
                    rounded-xl
                    border-gray-300
                "
            >
                <option value="">
                    Pilih Jenis Kelamin
                </option>

                <option value="L">
                    Laki-laki
                </option>

                <option value="P">
                    Perempuan
                </option>
            </select>

            <InputError
                class="mt-2"
                :message="
                    form.errors.gender
                "
            />
        </div>

        <div>
            <InputLabel
                value="Tanggal Lahir"
            />

            <TextInput
                type="date"
                v-model="
                    form.birth_date
                "
                class="
                    mt-1
                    block
                    w-full
                "
            />

            <InputError
                class="mt-2"
                :message="
                    form.errors.birth_date
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
            />

            <InputError
                class="mt-2"
                :message="
                    form.errors.password
                "
            />
        </div>

        <div>
            <InputLabel
                value="
                    Konfirmasi Password
                "
            />

            <TextInput
                type="password"
                v-model="
                    form.password_confirmation
                "
                class="
                    mt-1
                    block
                    w-full
                "
            />

            <InputError
                class="mt-2"
                :message="
                    form.errors
                        .password_confirmation
                "
            />
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
            Daftar
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
            Sudah memiliki akun?

            <Link
                :href="
                    route(
                        'login'
                    )
                "
                class="
                    font-semibold
                    text-blue-600
                    hover:underline
                "
            >
                Login
            </Link>
        </div>

    </form>

</GuestLayout>
</template>