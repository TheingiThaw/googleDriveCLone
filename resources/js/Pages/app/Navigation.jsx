import React from 'react'
import ApplicationLogo from '../../Components/ApplicationLogo'
import NavLink from '../../Components/NavLink'
import { Link } from '@inertiajs/react'
import CreateNewDropdown from './CreateNewDropdown'

const Navigation = () => {
    return (
        <div className='min-w-[200]px flex flex-col'>
            <Link href='/' className='h-[80px] p-3 shadow-lg flex items-center justify-center'>
                <ApplicationLogo className="h-20 w-20" />
                GoogleDriveClone
            </Link>

            <div>
                <CreateNewDropdown />
                <div className='flex flex-col px-10 gap-3'>
                    <NavLink href={route('my.files')}>My Files</NavLink>
                    <NavLink href='/'>Shared with Me</NavLink>
                    <NavLink href='/'>Shared by Me</NavLink>
                    <NavLink href='/'>Trash</NavLink>
                </div>
            </div>
        </div>
    )
}

export default Navigation
