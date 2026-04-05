<script setup lang="ts">
interface Props {
    id: string
    from: string
    via: string
    to: string
    animated?: boolean
}

const props = withDefaults(defineProps<Props>(), {
    animated: true,
})
</script>

<template>
    <section :id="id" :class="[
        'min-h-screen h-screen flex flex-col justify-center bg-gradient-to-br overflow-hidden',
        props.from, props.via, props.to,
        props.animated && 'gradient-animation',
    ]">
        <div class="px-0 sm:px-6 md:px-8 lg:px-10 xl:px-12">
            <slot></slot>
        </div>
    </section>
</template>
