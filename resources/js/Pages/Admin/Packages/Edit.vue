<script setup>
import {
    Link,
    useForm,
} from '@inertiajs/vue3'

const props = defineProps({
    package: Object,
})

const form = useForm({
    name:
        props.package.name,

    destination:
        props.package.destination,

    duration_days:
        props.package
            .duration_days,

    price:
        props.package.price,

    distance_km:
        props.package
            .distance_km,

    thumbnail:
        props.package
            .thumbnail ?? '',

    description:
        props.package
            .description,

    facilities:
        props.package
            .facilities,

    itinerary:
        props.package
            .itinerary,

    status:
        props.package.status,
})

function submit() {
    form.put(
        route(
            'admin.packages.update',
            props.package.id
        )
    )
}
</script>

<template>
<div class="min-h-screen bg-slate-100">

    <!-- Hero -->
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
                max-w-5xl
                px-6
                py-14
            "
        >

            <Link
                :href="
                    route(
                        'admin.packages.index'
                    )
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
                    transition
                    hover:bg-white/20
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
                Edit Paket
            </h1>

            <p
                class="
                    mt-4
                    text-xl
                    text-blue-100
                "
            >
                Perbarui informasi
                paket wisata.
            </p>

        </div>
    </section>

    <div
        class="
            mx-auto
            -mt-8
            max-w-5xl
            px-6
            pb-16
        "
    >
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
                    grid
                    gap-6
                    md:grid-cols-2
                "
            >

                <!-- Nama -->
                <div>
                    <label
                        class="
                            mb-2
                            block
                            font-semibold
                        "
                    >
                        Nama Paket
                    </label>

                    <input
                        v-model="
                            form.name
                        "
                        class="
                            w-full
                            rounded-2xl
                            border-slate-200
                        "
                    >
                </div>

                <!-- Destinasi -->
                <div>
                    <label
                        class="
                            mb-2
                            block
                            font-semibold
                        "
                    >
                        Destinasi
                    </label>

                    <input
                        v-model="
                            form.destination
                        "
                        class="
                            w-full
                            rounded-2xl
                            border-slate-200
                        "
                    >
                </div>

                <!-- Durasi -->
                <div>
                    <label
                        class="
                            mb-2
                            block
                            font-semibold
                        "
                    >
                        Durasi
                        (Hari)
                    </label>

                    <input
                        type="number"
                        v-model="
                            form.duration_days
                        "
                        class="
                            w-full
                            rounded-2xl
                            border-slate-200
                        "
                    >
                </div>

                <!-- Harga -->
                <div>
                    <label
                        class="
                            mb-2
                            block
                            font-semibold
                        "
                    >
                        Harga
                    </label>

                    <input
                        type="number"
                        v-model="
                            form.price
                        "
                        class="
                            w-full
                            rounded-2xl
                            border-slate-200
                        "
                    >
                </div>

                <!-- Distance -->
                <div>
                    <label
                        class="
                            mb-2
                            block
                            font-semibold
                        "
                    >
                        Distance
                        (KM)
                    </label>

                    <input
                        type="number"
                        v-model="
                            form.distance_km
                        "
                        class="
                            w-full
                            rounded-2xl
                            border-slate-200
                        "
                    >
                </div>

                <!-- Status -->
                <div>
                    <label
                        class="
                            mb-2
                            block
                            font-semibold
                        "
                    >
                        Status
                    </label>

                    <select
                        v-model="
                            form.status
                        "
                        class="
                            w-full
                            rounded-2xl
                            border-slate-200
                        "
                    >
                        <option
                            value="available"
                        >
                            Available
                        </option>

                        <option
                            value="unavailable"
                        >
                            Unavailable
                        </option>
                    </select>
                </div>

            </div>

            <!-- Thumbnail -->
            <div
                class="
                    mt-6
                "
            >
                <label
                    class="
                        mb-2
                        block
                        font-semibold
                    "
                >
                    Thumbnail URL
                </label>

                <input
                    v-model="
                        form.thumbnail
                    "
                    class="
                        w-full
                        rounded-2xl
                        border-slate-200
                    "
                >
            </div>

            <div
                v-if="
                    form.thumbnail
                "
                class="
                    mt-5
                "
            >
                <img
                    :src="
                        form.thumbnail
                    "
                    class="
                        h-56
                        w-full
                        rounded-3xl
                        object-cover
                    "
                >
            </div>

            <!-- Description -->
            <div
                class="
                    mt-8
                "
            >
                <label
                    class="
                        mb-2
                        block
                        font-semibold
                    "
                >
                    Deskripsi
                </label>

                <textarea
                    rows="5"
                    v-model="
                        form.description
                    "
                    class="
                        w-full
                        rounded-2xl
                        border-slate-200
                    "
                />
            </div>

            <!-- Facilities -->
            <div
                class="
                    mt-6
                "
            >
                <label
                    class="
                        mb-2
                        block
                        font-semibold
                    "
                >
                    Fasilitas
                </label>

                <textarea
                    rows="7"
                    v-model="
                        form.facilities
                    "
                    class="
                        w-full
                        rounded-2xl
                        border-slate-200
                    "
                />
            </div>

            <!-- Itinerary -->
            <div
                class="
                    mt-6
                "
            >
                <label
                    class="
                        mb-2
                        block
                        font-semibold
                    "
                >
                    Itinerary
                </label>

                <textarea
                    rows="10"
                    v-model="
                        form.itinerary
                    "
                    class="
                        w-full
                        rounded-2xl
                        border-slate-200
                    "
                />
            </div>

            <!-- Button -->
            <div
                class="
                    mt-8
                    flex
                    justify-end
                "
            >
                <button
                    @click="
                        submit
                    "
                    class="
                        rounded-2xl
                        bg-blue-600
                        px-8
                        py-4
                        font-semibold
                        text-white
                        transition
                        hover:bg-blue-700
                    "
                >
                    Update Paket
                </button>
            </div>

        </div>
    </div>

</div>
</template>