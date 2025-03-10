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
          <img src="/static/media/logos/fast-kart.png" alt="fast-kart-logo" />
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