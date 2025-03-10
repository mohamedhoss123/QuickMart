import { CiSearch } from "react-icons/ci";
import { Input } from "./ui/input";

export default function Search() {
    return (
        <div className="relative flex items-center justify-between">
            <Input placeholder="search for product, delivered to your door..." className="w-[500px] rounded-[5px] border-[#D3D3D3] " />
            
            <div className="absolute top-[2.5px] right-3">
                <CiSearch color="#4A5568" size={30}  />
            </div>

            <div>

            </div>
        </div>
    )
}