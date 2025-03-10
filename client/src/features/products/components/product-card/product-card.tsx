import 'react-lazy-load-image-component/src/effects/blur.css';

import { LazyLoadImage } from "react-lazy-load-image-component";
import ProductBuyButton from './product-buy-button';
import ProductDetails from './product-details';
import ProductQuantityButton from './product-quantity-button';

export default function ProductCard() {
    return (
        <div className='border border-[#ECECEC] rounded-[6px] w-full max-w-[250px] min-h-[330px] max-h-[330px] flex flex-col items-start justify-start p-4'>
            <div className='flex items-center justify-center w-full '>
                <LazyLoadImage alt='product-img' effect='blur' wrapperProps={{
                    style: { transitionDelay: "400ms" },
                }} src='/static/dev/imgs/pepper.png' draggable={false} className='select-none' />
            </div>
            <ProductDetails />

            <div className='flex items-center justify-between w-full mt-3'>
                <ProductQuantityButton />
                <ProductBuyButton />
            </div>
        </div>
    )
}
