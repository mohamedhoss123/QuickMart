import MarketingPage from '@/components/marketing-page'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/')({
    component: MarketingPage,
})