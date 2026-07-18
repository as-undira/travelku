<script setup>
defineProps({
    bookingCount: Number,
    tier: String,
    distance: Number,
    discount: Number,
})
</script>

<template>
    <div>
        <h1>User Dashboard</h1>

        <p>Total Booking : {{ bookingCount }}</p>
        <p>Tier : {{ tier }}</p>
        <p>Distance : {{ distance }} KM</p>
        <p>Discount : {{ discount }}%</p>
    </div>
</template>