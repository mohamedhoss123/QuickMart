import { Outlet, createRootRoute } from '@tanstack/react-router'

import AnouncementBanner from '@/components/anouncement-banner'
import Header from '@/components/header'
import { TanStackRouterDevtools } from '@tanstack/router-devtools'

export const Route = createRootRoute({
    component: () => (
        <>
            <AnouncementBanner />
            <Header />
            <Outlet />
            <TanStackRouterDevtools />
        </>
    ),
})