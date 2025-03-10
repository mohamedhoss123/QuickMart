import ProductCard from '@/features/products/components/product-card/product-card'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/')({
    component: Index,
})

function Index() {
    return (
        <div className="p-2">
            <h3>Welcome Home!</h3>

            <div>
                <ProductCard />
            </div>
        </div>
    )
}