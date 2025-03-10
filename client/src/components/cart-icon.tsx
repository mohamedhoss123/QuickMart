import { IoCartOutline } from "react-icons/io5";

export default function CartIcon() {
    return (
        <div className="relative p-2 transition-colors rounded-full cursor-pointer hover:bg-gray-100">
            <div className="absolute top-0 right-0 bg-[#FF7272] text-white w-5 h-5 rounded-[5px] flex items-center justify-center ">
                2
            </div>
            <IoCartOutline size={25} color="#4A5568" />
        </div>
    )
}
