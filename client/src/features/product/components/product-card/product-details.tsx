import ProductRatings from "./product-ratings";

export default function ProductDetails() {
    return (
        <div className="flex flex-col items-start mt-8">
            <ProductRatings />
            <h3>Bell Pepper</h3>
            <div className="flex items-center space-x-2">
                <p className="text-[#0BAF9A]">
                    $70.21
                </p>

                <del className="text-[#4A5568]">
                    $65.25
                </del>
            </div>
        </div>
    )
}
