export interface ProductTag {
    name: string;
    bgColor: string;
    hoverBgColor: string;
}

export interface Product {
    name: string;
    tagline: string;
    description: string;
    status: 'live' | 'in-progress';
    role: string;
    period?: string;
    url?: string;
    image?: string;
    highlights?: string[];
    tech: ProductTag[];
    cv: {
        description: string;
        bullets: string[];
    };
}

export const products: Product[] = [
    {
        name: 'GridTrip',
        tagline: 'Plan your entire F1 race weekend in one place',
        url: 'https://gridtrip.co',
        image: '/products/gridtrip.webp',
        status: 'live',
        role: 'Founder & sole developer',
        period: "Jul '26 - present",
        description:
            'Pick a Grand Prix and GridTrip lines up real tickets, flights and hotels around it, with grandstand guides and race-day transit tips, so the whole weekend is planned in minutes instead of across ten browser tabs.',
        highlights: [
            'Real ticket inventory from official promoters and established resellers, with honest prices',
            'Grandstand guides covering what you will see, whether it is covered and if there is a screen',
            'Shareable group plans with per-person costs, plus email alerts when tickets go on sale',
        ],
        tech: [
            {
                name: 'Laravel',
                bgColor: 'bg-red-600',
                hoverBgColor: 'hover:bg-red-700',
            },
            {
                name: 'Inertia',
                bgColor: 'bg-indigo-600',
                hoverBgColor: 'hover:bg-indigo-700',
            },
            {
                name: 'React',
                bgColor: 'bg-sky-400',
                hoverBgColor: 'hover:bg-sky-500',
            },
            {
                name: 'Tailwind',
                bgColor: 'bg-cyan-400',
                hoverBgColor: 'hover:bg-cyan-500',
            },
        ],
        cv: {
            description:
                'Plan an entire F1 race weekend in one place: tickets, flights, hotels and grandstand guides.',
            bullets: [
                'Designed, built, launched and operated solo, from product decisions to infrastructure',
                'Real ticket inventory from official promoters and resellers, with on-sale email alerts',
                'Shareable group plans with per-person costs',
            ],
        },
    },
    {
        name: 'Lock In',
        tagline: 'Gamified GCSE revision for iOS',
        status: 'in-progress',
        role: 'Co-founder',
        description:
            'A native iOS app, built end to end. Public launch coming soon.',
        tech: [
            {
                name: 'Swift',
                bgColor: 'bg-orange-500',
                hoverBgColor: 'hover:bg-orange-600',
            },
            {
                name: 'SwiftUI',
                bgColor: 'bg-blue-500',
                hoverBgColor: 'hover:bg-blue-600',
            },
        ],
        cv: {
            description:
                'Gamified GCSE revision app for iOS. In development, launching late 2026.',
            bullets: [
                'Native iOS app in Swift and SwiftUI, built end to end with Claude Code',
            ],
        },
    },
];
