import CartIcon from "./cart-icon";
import Container from "./container";
import Search from "./search";
import { Separator } from "./ui/separator";
import UserProfile from "./user-profile";

export default function Header() {
  return (
    <header className="border-b border-[#ECECEC] p-5">
      <Container className="flex items-center justify-between">
        <div>
          <h1 className="text-2xl font-bold font-sans">
            <span className="text-[#0BAF9A]">Quick</span><span className="text-[#22222]">Mart</span>
          </h1>
        </div>

        <div>
          <Search />
        </div>

        <div className="flex items-center h-5 space-x-4 text-sm">
          <CartIcon />
          <Separator orientation="vertical" />
          <UserProfile />
        </div>
      </Container>
    </header>
  )
}