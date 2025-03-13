import { FaRegStar } from "react-icons/fa";
import { FaStar } from "react-icons/fa";

export default function ProductRatings() {
    return (
        <div className="flex items-center my-1 space-x-1">
            <FaStar size={18} color="#FFB321" fill="#FFB321" />
            <FaStar size={18} color="#FFB321" fill="#FFB321" />
            <FaRegStar size={18} color="#FFB321" />
            <FaRegStar size={18} color="#FFB321" />
            <FaRegStar size={18} color="#FFB321" />
        </div>
    )
}
