import { Outlet, createRootRoute } from '@tanstack/react-router'

import Header from '@/components/header'
import { TanStackRouterDevtools } from '@tanstack/router-devtools'

export const Route = createRootRoute({
    component: () => (
        <>
            <Header />
            <hr />
            <Outlet />
            <TanStackRouterDevtools />
        </>
    ),
})