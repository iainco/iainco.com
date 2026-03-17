<script setup lang="ts">
interface Props {
    icon: any
    iconClasses: Array<string>
    name: string
    description: string
    url?: string
}

const props = defineProps<Props>()
</script>

<template>
    <div class="h-full p-5 sm:p-6 lg:p-8 bg-white rounded-4xl border-4 border-gray-200 flex flex-col">
        <div class="mb-4 flex items-center">
            <div class="mr-4 size-12 rounded-full bg-gradient-to-br text-white flex items-center justify-center" :class="iconClasses">
                <component :is="icon" :size="24"  />
            </div>

            <div>
                <h4 class="font-bold text-gray-800">
                    {{ props.name }}
                </h4>

                <p class="text-sm text-gray-600">
                    <a v-if="url" class="text-blue-500" target="_blank" :href="props.url">{{ props.url }}</a>
                    <span v-else>Coming soon</span>
                </p>
            </div>
        </div>

        <p class="mb-8 text-sm text-gray-700 flex-1">
            {{ props.description }}
        </p>

        <div class="flex flex-wrap gap-1">
            <slot name="tech-tags"></slot>
        </div>
    </div>
</template>
