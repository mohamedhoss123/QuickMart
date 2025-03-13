import { FaHeart, FaRegHeart } from "react-icons/fa";

import { useState } from "react";

export default function ProductHeader() {
    const [toggleHeart, setToggleHeart] = useState<boolean>(false)


    const handleToggleHeart = () => {
        setToggleHeart(prev => !prev)
    }
    return (
        <div className="w-full flex items-center justify-between">
            <div className="text-white bg-[#0BAF9A] py-1 px-4 rounded-md">
                %50
            </div>
            <div className="cursor-pointer" onClick={handleToggleHeart}>
                {
                    toggleHeart ? <FaRegHeart size={25} color="#4A5568" /> : <FaHeart color="red" size={25} />
                }
            </div>
        </div>
    )
}
