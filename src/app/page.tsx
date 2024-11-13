// import Image from "next/image";

import Project from "@/components/Project";
import TopBanner from "@/components/TopBanner";

// import Image from "next/image";

export default function Home() {
  return (
    <div className="p1-6 -pr-10  flex flex-col w-auto">
      <TopBanner />
      <Project />
    </div>
  );
}
