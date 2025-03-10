import { CiSearch } from "react-icons/ci";
import { Input } from "./ui/input";

export default function Search() {
    return (
        <div className="relative flex items-center justify-between">
            <Input placeholder="search for product, delivered to your door..." className="w-[400px] rounded-[6px]" />
            
            <div className="absolute top-[2.5px] right-3">
                <CiSearch color="#4A5568" size={30} />
            </div>

            <div>

            </div>
        </div>
    )
}