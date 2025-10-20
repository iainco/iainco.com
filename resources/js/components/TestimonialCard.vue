<script setup lang="ts">
import { CircleUserRoundIcon, Star } from 'lucide-vue-next'

interface Props {
    iconClasses: Array<string>
    clientName: string
    projectName: string
    bodyText: string
}

const props = defineProps<Props>()
</script>

<template>
    <div class="p-4 lg:p-8 bg-white rounded-none sm:rounded-4xl border-t-4 border-b-0 last:border-b-4 sm:border-4 shadow-2xl sm:transition-transform sm:hover:scale-105">
        <div class="mb-4 flex items-center justify-between sm:block">
            <div class="mb-0 sm:mb-4 flex items-center">
                <div
                    class="mr-4 size-12 rounded-full bg-gradient-to-br text-white flex items-center justify-center"
                    :class="iconClasses"
                >
                    <CircleUserRoundIcon :size="24"/>
                </div>

                <div>
                    <h4 class="font-bold text-gray-800">{{ props.clientName }}</h4>
                    <p class="text-sm text-gray-600">{{ props.projectName }}</p>
                </div>
            </div>

            <div class="mb-4 flex">
                <Star class="text-yellow-400"/>
                <Star class="text-yellow-400"/>
                <Star class="text-yellow-400"/>
                <Star class="text-yellow-400"/>
                <Star class="text-yellow-400"/>
            </div>
        </div>

        <p class="text-sm text-gray-700">{{ props.bodyText }}</p>
    </div>
</template>
