import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import { RouterProvider } from 'react-router-dom'
import { router } from './router/router.tsx'
import MainRootLayout from './components/MainRootLayout/MainRootLayout.tsx'

const queryClient = new QueryClient()


createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <QueryClientProvider client={queryClient}>
      <MainRootLayout>
        <RouterProvider router={router} />
      </MainRootLayout>
    </QueryClientProvider>
  </StrictMode>,
)