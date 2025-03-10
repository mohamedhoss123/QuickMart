import { FaRegUser } from "react-icons/fa";
import { Link } from "@tanstack/react-router";

export default function UserProfile() {
    return (
        <div className="flex items-center gap-2">
            <div className="p-2 transition-colors rounded-full cursor-pointer hover:bg-gray-100">
                <FaRegUser size={20} color="#222222" />
            </div>

            <div>
                <p className="text-[#4A5568] font-medium">
                    Ahmed,
                </p>

                <Link to="/" className="text-[#222222] font-bold hover:underline ">
                    My Account
                </Link>
            </div>
        </div>
    )
}
