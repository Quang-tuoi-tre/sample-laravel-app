// "use client"

// import { useState } from "react"
// import {
//   AlertCircle,
//   Book,
//   ChevronDown,
//   Code,
//   CodeSquare,
//   Eye,
//   FileCode2,
//   Folder,
//   GitBranch,
//   GitFork,
//   GitPullRequest,
//   History,
//   Menu,
//   Play,
//   Plus,
//   Settings,
//   Shield,
//   Star,
//   Tag,
// } from "lucide-react"
// import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar"
// import { Button } from "@/components/ui/button"
// import { Input } from "@/components/ui/input"
// import { Separator } from "@/components/ui/separator"
// import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from "@/components/ui/dropdown-menu"
// import { Badge } from "@/components/ui/badge"

// export default function GitHubRjepoInterface() {
//   const [searchQuery, setSearchQuery] = useState("")

//   const files = [
//     { name: "app", type: "directory", lastCommit: "buoi 5", lastUpdated: "last week" },
//     { name: "bootstrap", type: "directory", lastCommit: "first commit", lastUpdated: "last month" },
//     { name: "cacbuoihoc", type: "directory", lastCommit: "cap nhat lai code", lastUpdated: "last week" },
//     { name: "config", type: "directory", lastCommit: "buoi 5", lastUpdated: "last week" },
//     { name: "database", type: "directory", lastCommit: "first commit", lastUpdated: "last month" },
//     { name: "mvc-app", type: "directory", lastCommit: "Lop nhan vien", lastUpdated: "last week" },
//     { name: "resources", type: "directory", lastCommit: "buoi 5", lastUpdated: "last week" },
//     { name: "routes", type: "directory", lastCommit: "buoi 5", lastUpdated: "last week" },
//     { name: "storage", type: "directory", lastCommit: "first commit", lastUpdated: "last month" },
//     { name: "tests", type: "directory", lastCommit: "first commit", lastUpdated: "last month" },
//     { name: ".editorconfig", type: "file", lastCommit: "first commit", lastUpdated: "last month" },
//     { name: ".env.example", type: "file", lastCommit: "first commit", lastUpdated: "last month" },
//     { name: ".gitattributes", type: "file", lastCommit: "first commit", lastUpdated: "last month" },
//   ]

//   return (
//     <div className="min-h-screen bg-black text-gray-300">
//       {/* Top Navigation Bar */}
//       <header className="border-b border-gray-800 px-4 py-3">
//         <div className="flex items-center justify-between">
//           <div className="flex items-center space-x-4">
//             <Button variant="ghost" size="icon" className="text-gray-400">
//               <Menu className="h-5 w-5" />
//             </Button>
//             <div className="flex items-center">
//               <Avatar className="h-8 w-8 mr-2">
//                 <AvatarImage src="/placeholder.svg?height=32&width=32" />
//                 <AvatarFallback className="bg-gray-800">GH</AvatarFallback>
//               </Avatar>
//               <div className="flex items-center">
//                 <span className="font-medium">Quang-tuoi-tre</span>
//                 <span className="mx-1">/</span>
//                 <span className="font-medium">sample-laravel-app</span>
//               </div>
//             </div>
//           </div>

//           <div className="flex items-center space-x-3">
//             <div className="relative">
//               <Input
//                 type="text"
//                 placeholder="Type / to search"
//                 className="w-64 bg-gray-900 border-gray-700 text-sm"
//                 value={searchQuery}
//                 onChange={(e) => setSearchQuery(e.target.value)}
//               />
//               <div className="absolute right-2 top-1/2 -translate-y-1/2 flex items-center text-xs text-gray-500">
//                 <kbd className="border border-gray-700 rounded px-1 mr-1">⌘</kbd>
//                 <kbd className="border border-gray-700 rounded px-1">K</kbd>
//               </div>
//             </div>

//             <Button variant="ghost" size="icon" className="text-gray-400">
//               <Plus className="h-5 w-5" />
//             </Button>
//             <Button variant="ghost" size="icon" className="text-gray-400">
//               <AlertCircle className="h-5 w-5" />
//             </Button>
//             <Button variant="ghost" size="icon" className="text-gray-400">
//               <GitPullRequest className="h-5 w-5" />
//             </Button>

//             <Avatar className="h-8 w-8">
//               <AvatarImage src="/placeholder.svg?height=32&width=32" />
//               <AvatarFallback className="bg-gray-800">QT</AvatarFallback>
//             </Avatar>
//           </div>
//         </div>
//       </header>

//       {/* Main Navigation */}
//       <nav className="border-b border-gray-800 px-4">
//         <div className="flex items-center space-x-6">
//           <Button variant="ghost" className="flex items-center space-x-2 py-3 border-b-2 border-orange-500">
//             <Code className="h-4 w-4" />
//             <span>Code</span>
//           </Button>
//           <Button variant="ghost" className="flex items-center space-x-2 py-3">
//             <AlertCircle className="h-4 w-4" />
//             <span>Issues</span>
//           </Button>
//           <Button variant="ghost" className="flex items-center space-x-2 py-3">
//             <GitPullRequest className="h-4 w-4" />
//             <span>Pull requests</span>
//           </Button>
//           <Button variant="ghost" className="flex items-center space-x-2 py-3">
//             <Play className="h-4 w-4" />
//             <span>Actions</span>
//           </Button>
//           <Button variant="ghost" className="flex items-center space-x-2 py-3">
//             <CodeSquare className="h-4 w-4" />
//             <span>Projects</span>
//           </Button>
//           <Button variant="ghost" className="flex items-center space-x-2 py-3">
//             <Shield className="h-4 w-4" />
//             <span>Security</span>
//           </Button>
//           <Button variant="ghost" className="flex items-center space-x-2 py-3">
//             <History className="h-4 w-4" />
//             <span>Insights</span>
//           </Button>
//           <Button variant="ghost" className="flex items-center space-x-2 py-3">
//             <Settings className="h-4 w-4" />
//             <span>Settings</span>
//           </Button>
//         </div>
//       </nav>

//       {/* Repository Header */}
//       <div className="px-4 py-4 border-b border-gray-800">
//         <div className="flex items-center">
//           <Avatar className="h-8 w-8 mr-2">
//             <AvatarImage src="/placeholder.svg?height=32&width=32" />
//             <AvatarFallback className="bg-gray-800">QT</AvatarFallback>
//           </Avatar>
//           <h1 className="text-xl font-semibold text-white mr-2">sample-laravel-app</h1>
//           <Badge variant="outline" className="rounded-full text-xs">
//             Public
//           </Badge>
//         </div>
//       </div>

//       {/* Repository Actions */}
//       <div className="px-4 py-3 border-b border-gray-800">
//         <div className="flex justify-between">
//           <div className="flex items-center space-x-2">
//             <Button variant="outline" size="sm" className="flex items-center space-x-1 text-sm">
//               <GitBranch className="h-4 w-4 mr-1" />
//               <span>quangho</span>
//               <ChevronDown className="h-4 w-4 ml-1" />
//             </Button>

//             <Button variant="outline" size="sm" className="flex items-center space-x-1 text-sm">
//               <GitBranch className="h-4 w-4 mr-1" />
//               <span>2</span>
//               <span>Branches</span>
//             </Button>

//             <Button variant="outline" size="sm" className="flex items-center space-x-1 text-sm">
//               <Tag className="h-4 w-4 mr-1" />
//               <span>0</span>
//               <span>Tags</span>
//             </Button>
//           </div>

//           <div className="flex items-center space-x-2">
//             <div className="relative">
//               <Input type="text" placeholder="Go to file" className="w-64 bg-gray-900 border-gray-700 text-sm h-9" />
//               <div className="absolute right-2 top-1/2 -translate-y-1/2 flex items-center text-xs text-gray-500">
//                 <kbd className="border border-gray-700 rounded px-1">t</kbd>
//               </div>
//             </div>

//             <DropdownMenu>
//               <DropdownMenuTrigger asChild>
//                 <Button variant="outline" size="sm" className="text-sm">
//                   Add file
//                   <ChevronDown className="h-4 w-4 ml-1" />
//                 </Button>
//               </DropdownMenuTrigger>
//               <DropdownMenuContent>
//                 <DropdownMenuItem>Create new file</DropdownMenuItem>
//                 <DropdownMenuItem>Upload files</DropdownMenuItem>
//               </DropdownMenuContent>
//             </DropdownMenu>

//             <Button variant="default" size="sm" className="bg-green-700 hover:bg-green-600 text-white text-sm">
//               <Code className="h-4 w-4 mr-1" />
//               Code
//               <ChevronDown className="h-4 w-4 ml-1" />
//             </Button>

//             <Button variant="ghost" size="sm" className="text-sm">
//               About
//             </Button>
//           </div>
//         </div>
//       </div>

//       {/* Main Content */}
//       <div className="flex">
//         {/* File Browser */}
//         <div className="flex-1 border-r border-gray-800">
//           {/* Commit Info */}
//           <div className="px-4 py-3 border-b border-gray-800 flex items-center">
//             <Avatar className="h-5 w-5 mr-2">
//               <AvatarImage src="/placeholder.svg?height=20&width=20" />
//               <AvatarFallback className="bg-gray-800 text-xs">QT</AvatarFallback>
//             </Avatar>
//             <span className="text-sm">Quang-tuoi-tre</span>
//             <span className="text-sm text-gray-500 ml-1">cap nhat lai code</span>
//             <span className="text-xs text-gray-500 ml-auto">9b28b7a · last week</span>
//             <Button variant="ghost" size="sm" className="ml-2 text-xs">
//               <span>5 Commits</span>
//             </Button>
//           </div>

//           {/* Files List */}
//           <div>
//             {files.map((file, index) => (
//               <div key={index} className="px-4 py-2 border-b border-gray-800 flex items-center hover:bg-gray-900">
//                 <div className="w-6 flex-shrink-0">
//                   {file.type === "directory" ? (
//                     <Folder className="h-4 w-4 text-blue-400" />
//                   ) : (
//                     <FileCode2 className="h-4 w-4 text-gray-500" />
//                   )}
//                 </div>
//                 <div className="flex-1 ml-2">
//                   <span className="text-sm">{file.name}</span>
//                 </div>
//                 <div className="flex-1 text-sm text-gray-500">{file.lastCommit}</div>
//                 <div className="text-xs text-gray-500">{file.lastUpdated}</div>
//               </div>
//             ))}
//           </div>
//         </div>

//         {/* Sidebar */}
//         <div className="w-80 p-4">
//           <div className="mb-6">
//             <h3 className="text-sm font-medium mb-2">About</h3>
//             <p className="text-sm text-gray-500">No description, website, or topics provided.</p>

//             <div className="mt-4 space-y-2">
//               <div className="flex items-center text-sm">
//                 <Book className="h-4 w-4 mr-2" />
//                 <span>Readme</span>
//               </div>
//               <div className="flex items-center text-sm">
//                 <History className="h-4 w-4 mr-2" />
//                 <span>Activity</span>
//               </div>
//               <div className="flex items-center text-sm">
//                 <Star className="h-4 w-4 mr-2" />
//                 <span>0 stars</span>
//               </div>
//               <div className="flex items-center text-sm">
//                 <Eye className="h-4 w-4 mr-2" />
//                 <span>1 watching</span>
//               </div>
//               <div className="flex items-center text-sm">
//                 <GitFork className="h-4 w-4 mr-2" />
//                 <span>0 forks</span>
//               </div>
//             </div>
//           </div>

//           <Separator className="my-4" />

//           <div className="mb-6">
//             <h3 className="text-sm font-medium mb-2">Releases</h3>
//             <p className="text-sm text-gray-500">No releases published</p>
//             <a href="#" className="text-sm text-blue-500 hover:underline">
//               Create a new release
//             </a>
//           </div>

//           <Separator className="my-4" />

//           <div className="mb-6">
//             <h3 className="text-sm font-medium mb-2">Packages</h3>
//             <p className="text-sm text-gray-500">No packages published</p>
//             <a href="#" className="text-sm text-blue-500 hover:underline">
//               Publish your first package
//             </a>
//           </div>

//           <Separator className="my-4" />

//           <div>
//             <h3 className="text-sm font-medium mb-2">Languages</h3>
//             <div className="h-2 rounded-full overflow-hidden flex mb-3">
//               <div className="bg-purple-600 h-full" style={{ width: "70.7%" }}></div>
//               <div className="bg-red-500 h-full" style={{ width: "26.1%" }}></div>
//               <div className="bg-gray-500 h-full" style={{ width: "3.2%" }}></div>
//             </div>
//             <div className="space-y-1 text-sm">
//               <div className="flex items-center">
//                 <span className="h-3 w-3 rounded-full bg-purple-600 mr-2"></span>
//                 <span>PHP 70.7%</span>
//               </div>
//               <div className="flex items-center">
//                 <span className="h-3 w-3 rounded-full bg-red-500 mr-2"></span>
//                 <span>Blade 26.1%</span>
//               </div>
//               <div className="flex items-center">
//                 <span className="h-3 w-3 rounded-full bg-gray-500 mr-2"></span>
//                 <span>Hack 1.4%</span>
//               </div>
//               <div className="flex items-center">
//                 <span className="h-3 w-3 rounded-full bg-gray-400 mr-2"></span>
//                 <span>Other 1.8%</span>
//               </div>
//             </div>
//           </div>
//         </div>
//       </div>
//     </div>
//   )
// }

