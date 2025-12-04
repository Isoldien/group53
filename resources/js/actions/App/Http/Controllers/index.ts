import ContactController from './ContactController'
import DatabaseConnectionController from './DatabaseConnectionController'
import Settings from './Settings'
const Controllers = {
    ContactController: Object.assign(ContactController, ContactController),
DatabaseConnectionController: Object.assign(DatabaseConnectionController, DatabaseConnectionController),
Settings: Object.assign(Settings, Settings),
}

export default Controllers