import { Button } from "./ui/button"
import { IoClose } from "react-icons/io5";
import { useState } from "react"

export default function AnouncementBanner() {
    const [isOpen, setIsOpen] = useState<boolean>(true)
    return (
        isOpen && <div className="bg-[#0BAF9A] w-full h-[40px] flex items-center justify-between">
            <div>

            </div>
            <div className="flex items-center justify-center space-x-3 text-white">
                <p className="font-bold">
                    Welcome to QuickMart!
                </p>
                <p>
                    Wrap new offers/gift every single day on Weekends.
                </p>
                <p className="font-bold">
                    New Coupon Code: QuickMart024
                </p>
            </div>

            <Button onClick={() => setIsOpen(false)} variant={"link"} className="font-bold text-white cursor-pointer">
                <div className="flex items-center ">
                    Close
                    <IoClose color="white" />
                </div>
            </Button>
        </div>
    )
}