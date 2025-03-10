import { Button } from "@/components/ui/button";
import { FaBasketShopping } from "react-icons/fa6";

export default function ProductBuyButton() {
    return (
        <Button className="bg-[#0BAF9A] hover:bg-[#0BAF9A]/90 cursor-pointer w-[60px]">
            <FaBasketShopping color="white" />
        </Button>
    )
}
