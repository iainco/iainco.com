<script setup lang="ts">
interface Props {
    name: string;
}

const props = defineProps<Props>();
</script>

<template>
    <div class="space-y-2">
        <div class="rounded-2xl sm:rounded-3xl border-4 border-gray-200 bg-white p-4">
            <svg
                class="size-8 sm:size-12"
                viewBox="0 0 128 128"
                xmlns="http://www.w3.org/2000/svg"
            >
                <slot></slot>
            </svg>
        </div>
        <div class="funnel-display font-semibold text-white text-sm sm:text-base md:text-lg text-center">
            {{ props.name }}
        </div>
    </div>
</template>
