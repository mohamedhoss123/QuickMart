import { Button } from "@/components/ui/button"
import { FaMinus } from "react-icons/fa";
import { FaPlus } from "react-icons/fa";
import { useState } from "react"

export default function ProductQuantityButton() {
    const [quantity, setQuantity] = useState<number>(1)

    const incrementQuantity = () => {
        setQuantity(quantity + 1)
    }

    const decrementQuantity = () => {
        if (quantity > 1) {
            setQuantity(quantity - 1)
        }
    }

    return (
        <div className="border-[2px] border-[#ECECEC] flex items-center  rounded-[6px] overflow-hidden h-[40px]">
            <Button onClick={decrementQuantity} className="rounded-[0] bg-transparent hover:bg-accent border-r-[2px] border-[#ECECEC] cursor-pointer">
                <FaMinus color="black" />
            </Button>
            <div className="w-[50px] h-full flex items-center justify-center font-medium  bg-[#ECECEC]">
                {quantity}
            </div>

            <Button onClick={incrementQuantity} className="rounded-[0] bg-transparent hover:bg-accent border-l-[2px] border-[#ECECEC] cursor-pointer">
                <FaPlus color="black" />
            </Button>
        </div>
    )
}
